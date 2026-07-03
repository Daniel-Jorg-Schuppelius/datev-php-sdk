<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : JobsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\HrExchange;

use APIToolkit\Entities\ID;
use Datev\API\Online\Support\{JobPoller, PollTick};
use Datev\Contracts\Abstracts\API\Online\{ClientScopedEndpointAbstract, HrExchangeJobWrites};
use Datev\Entities\Online\HrExchange\Jobs\{Job, JobResult, Resource};
use Datev\Enums\Online\HrTargetSystem;
use InvalidArgumentException;

/**
 * hr:exchange v1: Lese-Jobs — POST /jobs mit Resource-Beschreibung,
 * Status über GET /jobs/{uuid}, Ergebnis über GET /jobs/{uuid}/result[/...].
 */
class JobsEndpoint extends ClientScopedEndpointAbstract {
    use HrExchangeJobWrites;

    protected string $endpointSuffix = 'jobs';

    /**
     * Legt einen Lese-Job an (202).
     *
     * @param resource|array<string, mixed> $resource Beschreibung der anzufragenden Daten
     * @param HrTargetSystem|null $targetSystem Header Target-System (lodas oder lug)
     * @param string|null $notifyUrl Header Notify-Url (Callback nach Abschluss)
     * @param string|null $notifyAuth Header Notify-Auth (Authorization für den Callback)
     */
    public function create(Resource|array $resource, ?HrTargetSystem $targetSystem = null, ?string $notifyUrl = null, ?string $notifyAuth = null): ?Job {
        $data = $resource instanceof Resource ? $resource->toArray() : $resource;

        $headers = [];
        if ($targetSystem !== null) {
            $headers['Target-System'] = $targetSystem->value;
        }
        if ($notifyUrl !== null) {
            $headers['Notify-Url'] = $notifyUrl;
        }
        if ($notifyAuth !== null) {
            $headers['Notify-Auth'] = $notifyAuth;
        }

        return $this->logDebugWithTimer(
            fn () => $this->writeJob('POST', null, $data, 202, $headers),
            'Creating hr:exchange read job'
        );
    }

    /**
     * Liefert den Status eines Jobs.
     */
    public function get(ID|string|null $uuid = null): ?Job {
        if (is_null($uuid) || $uuid === '') {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Job-UUID is required');
        }

        $id = $uuid instanceof ID ? $uuid->toString() : (string) $uuid;

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/" . rawurlencode($id));

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Job::fromJson($response, self::$logger);
        }, "Fetching hr:exchange Job (UUID: {$id})");
    }

    /**
     * Löscht einen Job (DELETE, 204).
     */
    public function delete(string $uuid): void {
        $this->logDebugWithTimer(function () use ($uuid) {
            parent::deleteContents([], "{$this->getEndpointUrl()}/" . rawurlencode($uuid), 204);
        }, "Deleting hr:exchange Job (UUID: {$uuid})");
    }

    /**
     * Liefert das Gesamtergebnis eines Jobs (GET /jobs/{uuid}/result).
     */
    public function getResult(string $uuid): ?JobResult {
        return $this->fetchResult($uuid, '');
    }

    public function getResultClientData(string $uuid): ?JobResult {
        return $this->fetchResult($uuid, '/client-data');
    }

    public function getResultEmployees(string $uuid): ?JobResult {
        return $this->fetchResult($uuid, '/employees');
    }

    public function getResultEmploymentPeriods(string $uuid): ?JobResult {
        return $this->fetchResult($uuid, '/employment-periods');
    }

    public function getResultMonthRecords(string $uuid): ?JobResult {
        return $this->fetchResult($uuid, '/month-records');
    }

    public function getResultIndividualData(string $uuid): ?JobResult {
        return $this->fetchResult($uuid, '/individual-data');
    }

    public function getResultAbsencesLug(string $uuid): ?JobResult {
        return $this->fetchResult($uuid, '/absences/lug');
    }

    public function getResultAbsencesLodas(string $uuid): ?JobResult {
        return $this->fetchResult($uuid, '/absences/lodas');
    }

    public function getResultGrossPayments(string $uuid): ?JobResult {
        return $this->fetchResult($uuid, '/gross-payments');
    }

    public function getResultHourlyWages(string $uuid): ?JobResult {
        return $this->fetchResult($uuid, '/hourly-wages');
    }

    public function getResultErrors(string $uuid): ?JobResult {
        return $this->fetchResult($uuid, '/errors');
    }

    /**
     * Pollt einen Job bis zum Endzustand. Die Job-States sind in der
     * Spezifikation nicht formal enumeriert; die Terminal-States können
     * daher überschrieben werden.
     *
     * @param array<int, string> $terminalStates
     */
    public function waitForJob(string $uuid, array $terminalStates = ['finished', 'failed'], ?JobPoller $poller = null): ?Job {
        $poller ??= new JobPoller(logger: self::$logger);
        $terminalStates = array_map('strtolower', $terminalStates);

        return $poller->poll(function () use ($uuid, $terminalStates) {
            $job = $this->get($uuid);

            if ($job !== null && in_array(strtolower($job->getState() ?? ''), $terminalStates, true)) {
                return PollTick::done($job);
            }

            return PollTick::waiting();
        });
    }

    private function fetchResult(string $uuid, string $subPath): ?JobResult {
        return $this->logDebugWithTimer(function () use ($uuid, $subPath) {
            $urlPath = "{$this->getEndpointUrl()}/" . rawurlencode($uuid) . '/result' . $subPath;
            // 301 signalisiert, dass das Ergebnis über die Unterressourcen abzurufen ist
            $response = $this->requestResponse('GET', $urlPath, [], [200, 301]);
            $body = (string) $response->getBody();

            if ($body === '' || $body === '[]') {
                return null;
            }

            return JobResult::fromJson($body, self::$logger);
        }, "Fetching hr:exchange job result (UUID: {$uuid}" . ($subPath !== '' ? ", {$subPath}" : '') . ')');
    }
}
