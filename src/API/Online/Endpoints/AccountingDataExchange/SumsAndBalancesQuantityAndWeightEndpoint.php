<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SumsAndBalancesQuantityAndWeightEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\AccountingDataExchange;

use Datev\Contracts\Abstracts\API\Online\FiscalYearScopedEndpointAbstract;
use Datev\Entities\Online\AccountingDataExchange\Jobs\Job;

/**
 * Accounting Data Exchange v1: startet den asynchronen Export der Summen und
 * Salden mit Menge und Gewicht (202 + Job-ID). Ergebnis-Abruf über
 * SumsAndBalancesQuantityAndWeightJobsEndpoint, Status über JobsEndpoint.
 */
class SumsAndBalancesQuantityAndWeightEndpoint extends FiscalYearScopedEndpointAbstract {
    protected string $endpointSuffix = 'sums-and-balances-quantity-and-weight';

    public function createJob(): ?Job {
        return $this->logDebugWithTimer(function () {
            $response = parent::postContents([], [], null, 202);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Job::fromJson($response, self::$logger);
        }, 'Creating SumsAndBalancesQuantityAndWeight export job');
    }
}
