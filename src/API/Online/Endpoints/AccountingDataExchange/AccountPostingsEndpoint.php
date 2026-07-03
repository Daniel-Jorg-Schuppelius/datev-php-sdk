<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountPostingsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\AccountingDataExchange;

use Datev\Contracts\Abstracts\API\Online\FiscalYearScopedEndpointAbstract;
use Datev\Entities\Online\AccountingDataExchange\Jobs\Job;

/**
 * Accounting Data Exchange v1: startet den asynchronen Export der
 * Buchungssätze eines Wirtschaftsjahres (202 + Job-ID).
 * Ergebnis-Abruf über AccountPostingsJobsEndpoint, Status über JobsEndpoint.
 */
class AccountPostingsEndpoint extends FiscalYearScopedEndpointAbstract {
    protected string $endpointSuffix = 'account-postings';

    /**
     * @param bool $documentLinks Belegverknüpfungen in das Ergebnis aufnehmen
     */
    public function createJob(bool $documentLinks = false): ?Job {
        return $this->logDebugWithTimer(function () use ($documentLinks) {
            $urlPath = $this->getEndpointUrl();
            if ($documentLinks) {
                $urlPath .= '?documentLinks=true';
            }

            $response = parent::postContents([], [], $urlPath, 202);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Job::fromJson($response, self::$logger);
        }, 'Creating AccountPostings export job');
    }
}
