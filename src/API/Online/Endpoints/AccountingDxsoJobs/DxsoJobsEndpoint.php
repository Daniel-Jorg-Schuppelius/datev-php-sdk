<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DxsoJobsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\AccountingDxsoJobs;

use APIToolkit\Entities\ID;
use Datev\API\Online\Support\{JobPoller, PollTick};
use Datev\Contracts\Abstracts\API\Online\ClientScopedEndpointAbstract;
use Datev\Entities\Online\AccountingDxsoJobs\Jobs\{DxsoJob, DxsoJobStatus};
use Datev\Entities\Online\AccountingDxsoJobs\ProtocolEntries\ProtocolEntries;
use Datev\Enums\Online\DxsoImportType;
use InvalidArgumentException;
use Psr\Http\Message\StreamInterface;

/**
 * accounting:dxso-jobs v2: mehrstufiger Datentransfer nach Belege online.
 *
 * Ablauf: create() → addFile() (je Datei) → finalize() → get()/waitForCompletion()
 * → getProtocolEntries(); cancel() storniert nicht-finalisierte Jobs.
 */
class DxsoJobsEndpoint extends ClientScopedEndpointAbstract {
    protected string $endpointSuffix = 'dxso-jobs';

    /**
     * Legt einen neuen DXSO-Job an (201).
     */
    public function create(DxsoImportType $importType, string $accountingMonth): ?DxsoJob {
        return $this->logDebugWithTimer(function () use ($importType, $accountingMonth) {
            $response = parent::postContents([
                'import_type' => $importType->value,
                'accounting_month' => $accountingMonth,
            ], [], null, 201);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return DxsoJob::fromJson($response, self::$logger);
        }, "Creating DxsoJob ({$importType->value}, {$accountingMonth})");
    }

    /**
     * Liefert den Verarbeitungsstatus eines DXSO-Jobs.
     */
    public function get(ID|string|null $jobId = null): ?DxsoJobStatus {
        if (is_null($jobId) || $jobId === '') {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Job-ID is required');
        }

        $id = $jobId instanceof ID ? $jobId->toString() : (string) $jobId;

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/" . rawurlencode($id));

            if (empty($response) || $response === '[]') {
                return null;
            }

            return DxsoJobStatus::fromJson($response, self::$logger);
        }, "Fetching DxsoJobStatus (ID: {$id})");
    }

    /**
     * Hängt eine Datei an einen nicht-finalisierten Job an (multipart, 201).
     *
     * @param string|StreamInterface $file Dateiinhalt
     */
    public function addFile(string $jobId, string|StreamInterface $file, string $filename): void {
        $this->logDebugWithTimer(function () use ($jobId, $file, $filename) {
            $urlPath = "{$this->getEndpointUrl()}/" . rawurlencode($jobId) . '/files';

            $this->postMultipart([
                ['name' => 'files', 'contents' => $file, 'filename' => $filename],
            ], $urlPath, 201);
        }, "Adding file '{$filename}' to DxsoJob (ID: {$jobId})");
    }

    /**
     * Finalisiert einen Job und startet damit die Verarbeitung
     * (PUT application/merge-patch+json, 204).
     */
    public function finalize(string $jobId): void {
        $this->logDebugWithTimer(function () use ($jobId) {
            $urlPath = "{$this->getEndpointUrl()}/" . rawurlencode($jobId);
            $this->putMergePatch(['ready' => 'true'], $urlPath, 204);
        }, "Finalizing DxsoJob (ID: {$jobId})");
    }

    /**
     * Storniert einen nicht-finalisierten Job (DELETE, 204).
     */
    public function cancel(string $jobId): void {
        $this->logDebugWithTimer(function () use ($jobId) {
            parent::deleteContents([], "{$this->getEndpointUrl()}/" . rawurlencode($jobId), 204);
        }, "Cancelling DxsoJob (ID: {$jobId})");
    }

    /**
     * Liefert die Verarbeitungs-Protokolleinträge eines Jobs.
     */
    public function getProtocolEntries(string $jobId): ?ProtocolEntries {
        return $this->logDebugWithTimer(function () use ($jobId) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/" . rawurlencode($jobId) . '/protocol-entries');

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ProtocolEntries::fromJson($response, self::$logger);
        }, "Fetching ProtocolEntries (Job-ID: {$jobId})");
    }

    /**
     * Pollt den Jobstatus bis zum Endzustand (Succeeded/Failed/…).
     */
    public function waitForCompletion(string $jobId, ?JobPoller $poller = null): ?DxsoJobStatus {
        $poller ??= new JobPoller(logger: self::$logger);

        return $poller->poll(function () use ($jobId) {
            $status = $this->get($jobId);

            if ($status !== null && ($status->getStatus()?->isTerminal() ?? false)) {
                return PollTick::done($status);
            }

            return PollTick::waiting();
        });
    }
}
