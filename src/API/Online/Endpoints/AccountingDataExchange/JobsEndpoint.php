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

namespace Datev\API\Online\Endpoints\AccountingDataExchange;

use Datev\API\Online\Support\{JobPoller, PollTick};
use Datev\Contracts\Abstracts\API\Online\ClientScopedEndpointAbstract;
use Datev\Entities\Online\AccountingDataExchange\Jobs\JobStateResponse;

/**
 * Accounting Data Exchange v1: Status der asynchronen Export-Jobs.
 */
class JobsEndpoint extends ClientScopedEndpointAbstract {
    protected string $endpointSuffix = 'jobs';

    /**
     * Liefert den Status eines Jobs (GET .../jobs/{jobId}/state).
     */
    public function getState(string $jobId): ?JobStateResponse {
        return $this->logDebugWithTimer(function () use ($jobId) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/" . rawurlencode($jobId) . '/state');

            if (empty($response) || $response === '[]') {
                return null;
            }

            return JobStateResponse::fromJson($response, self::$logger);
        }, "Fetching JobState (ID: {$jobId})");
    }

    /**
     * Pollt den Jobstatus bis zum Endzustand (COMPLETED/FAILED/DELETED).
     */
    public function waitForJob(string $jobId, ?JobPoller $poller = null): ?JobStateResponse {
        $poller ??= new JobPoller(logger: self::$logger);

        return $poller->poll(function () use ($jobId) {
            $state = $this->getState($jobId);

            if ($state !== null && ($state->getJobState()?->isTerminal() ?? false)) {
                return PollTick::done($state);
            }

            return PollTick::waiting();
        });
    }
}
