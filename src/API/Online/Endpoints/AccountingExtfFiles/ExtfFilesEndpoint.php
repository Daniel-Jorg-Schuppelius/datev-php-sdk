<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExtfFilesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\AccountingExtfFiles;

use APIToolkit\Entities\ID;
use Datev\API\Online\Support\{JobLocation, JobPoller, LinkHeaderParser, PageMeta, PageResult, PollTick};
use Datev\Contracts\Abstracts\API\Online\ClientScopedEndpointAbstract;
use Datev\Entities\Online\AccountingExtfFiles\Jobs\{ExtfJob, ExtfJobs};
use InvalidArgumentException;
use Psr\Http\Message\StreamInterface;

/**
 * accounting:extf-files v3: Import von EXTF-Dateien (DATEV-Format).
 *
 * Die client-id ist die Verbundnummer "Beraternummer-Mandantennummer"
 * (z. B. "29098-100"), keine GUID.
 */
class ExtfFilesEndpoint extends ClientScopedEndpointAbstract {
    protected string $endpointSuffix = 'extf-files';

    /**
     * Importiert eine EXTF-Datei (application/octet-stream, 202 + Location + Retry-After).
     *
     * @param string|StreamInterface $file EXTF-Dateiinhalt
     * @param string $filename Wert für den erforderlichen Filename-Header
     * @param string|null $referenceId Optionaler Reference-Id-Header (Idempotenz/Nachverfolgung)
     * @param string|null $clientApplicationVersion Optionaler Client-Application-Version-Header
     */
    public function import(string|StreamInterface $file, string $filename, ?string $referenceId = null, ?string $clientApplicationVersion = null): ?JobLocation {
        return $this->logDebugWithTimer(function () use ($file, $filename, $referenceId, $clientApplicationVersion) {
            $headers = ['Filename' => $filename];
            if ($referenceId !== null) {
                $headers['Reference-Id'] = $referenceId;
            }
            if ($clientApplicationVersion !== null) {
                $headers['Client-Application-Version'] = $clientApplicationVersion;
            }

            $response = $this->postBinary($file, 'application/octet-stream', $headers, "{$this->getEndpointUrl()}/import", 202);

            return JobLocation::fromResponse($response);
        }, "Importing EXTF file '{$filename}'");
    }

    /**
     * Liefert die Import-Jobs des Mandanten (skip/top; Link + Total-Items).
     * @param array<string, mixed> $options
     * @param array<string, mixed> $queryParams
     * @return PageResult<\Datev\Entities\Online\AccountingExtfFiles\Jobs\ExtfJob>
     */
    public function searchJobs(array $queryParams = [], array $options = []): PageResult {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $urlPath = "{$this->getEndpointUrl()}/jobs";
            $queryString = http_build_query($queryParams);
            if ($queryString !== '') {
                $urlPath .= "?{$queryString}";
            }

            $response = $this->requestResponse('GET', $urlPath, $options, 200);
            $body = (string) $response->getBody();

            $items = (empty($body) || $body === '[]') ? null : ExtfJobs::fromJson($body, self::$logger);
            $totalItems = $response->getHeaderLine('Total-Items');

            return new PageResult(
                $items,
                is_numeric($totalItems) ? (int) $totalItems : null,
                LinkHeaderParser::fromResponse($response),
                PageMeta::fromResponse($response)
            );
        }, 'Searching ExtfJobs');
    }

    /**
     * Liefert einen einzelnen Import-Job.
     */
    public function get(ID|string|null $jobId = null): ?ExtfJob {
        if (is_null($jobId) || $jobId === '') {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Job-ID is required');
        }

        $id = $jobId instanceof ID ? $jobId->toString() : (string) $jobId;

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/jobs/" . rawurlencode($id));

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ExtfJob::fromJson($response, self::$logger);
        }, "Fetching ExtfJob (ID: {$id})");
    }

    /**
     * Pollt den Import-Job aus einer JobLocation bis zum Endzustand
     * (succeeded/failed); berücksichtigt den Retry-After-Hinweis des Imports.
     */
    public function waitForImport(JobLocation $jobLocation, ?JobPoller $poller = null): ?ExtfJob {
        $poller ??= new JobPoller(logger: self::$logger);
        $firstTick = true;

        return $poller->poll(function () use ($jobLocation, &$firstTick) {
            if ($firstTick) {
                $firstTick = false;
                if ($jobLocation->retryAfter !== null && $jobLocation->retryAfter > 0) {
                    return PollTick::waiting($jobLocation->retryAfter);
                }
            }

            $job = $this->get($jobLocation->getJobId());

            if ($job !== null && ($job->getResult()?->isTerminal() ?? false)) {
                return PollTick::done($job);
            }

            return PollTick::waiting();
        });
    }
}
