<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GeneralLedgerAccountsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\AccountingDataExchange;

use Datev\Contracts\Abstracts\API\Online\FiscalYearScopedEndpointAbstract;
use Datev\Entities\Online\AccountingDataExchange\GeneralLedgerAccounts\GeneralLedgerAccounts;

/**
 * Accounting Data Exchange v1: Sachkonten eines Wirtschaftsjahres (ndjson).
 */
class GeneralLedgerAccountsEndpoint extends FiscalYearScopedEndpointAbstract {
    protected string $endpointSuffix = 'general-ledger-accounts';

    public function search(array $queryParams = [], array $options = []): ?GeneralLedgerAccounts {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $urlPath = $this->getEndpointUrl();
            $queryString = http_build_query($queryParams);
            if ($queryString !== '') {
                $urlPath .= "?{$queryString}";
            }

            $options['headers'] = ($options['headers'] ?? []) + ['Accept' => 'application/x-ndjson'];
            $response = $this->requestResponse('GET', $urlPath, $options, 200);
            $rows = $this->parseNdjson((string) $response->getBody());

            return empty($rows) ? null : new GeneralLedgerAccounts($rows, self::$logger);
        }, 'Searching GeneralLedgerAccounts');
    }
}
