<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SumsAndBalancesQuantityAndWeightJobsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\AccountingDataExchange;

use Datev\Contracts\Abstracts\API\Online\ClientScopedEndpointAbstract;
use Datev\Entities\Online\AccountingDataExchange\SumsAndBalances\SumsAndBalancesQuantityAndWeightList;

/**
 * Accounting Data Exchange v1: Ergebnis eines Summen-und-Salden-Export-Jobs
 * mit Menge und Gewicht (application/x-ndjson).
 */
class SumsAndBalancesQuantityAndWeightJobsEndpoint extends ClientScopedEndpointAbstract {
    protected string $endpointSuffix = 'sums-and-balances-quantity-and-weight-jobs';

    public function getResult(string $jobId): ?SumsAndBalancesQuantityAndWeightList {
        return $this->logDebugWithTimer(function () use ($jobId) {
            $urlPath = "{$this->getEndpointUrl()}/" . rawurlencode($jobId);
            $response = $this->requestResponse('GET', $urlPath, ['headers' => ['Accept' => 'application/x-ndjson']], 200);
            $rows = $this->parseNdjson((string) $response->getBody());

            return empty($rows) ? null : new SumsAndBalancesQuantityAndWeightList($rows, self::$logger);
        }, "Fetching SumsAndBalancesQuantityAndWeight job result (ID: {$jobId})");
    }
}
