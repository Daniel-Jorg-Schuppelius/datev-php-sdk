<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FiscalYearsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\AccountingDataExchange;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Online\ClientScopedEndpointAbstract;
use Datev\Entities\Online\AccountingDataExchange\FiscalYears\{FiscalYear, FiscalYears};
use InvalidArgumentException;

/**
 * Accounting Data Exchange v1: Wirtschaftsjahre des Mandanten
 * (Antworten im application/x-ndjson-Format).
 */
class FiscalYearsEndpoint extends ClientScopedEndpointAbstract {
    protected string $endpointSuffix = 'fiscal-years';

    /**
     * @param array<string, mixed> $options
     * @param array<string, mixed> $queryParams
     */
    public function search(array $queryParams = [], array $options = []): ?FiscalYears {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $urlPath = $this->getEndpointUrl();
            $queryString = http_build_query($queryParams);
            if ($queryString !== '') {
                $urlPath .= "?{$queryString}";
            }

            $options['headers'] = ($options['headers'] ?? []) + ['Accept' => 'application/x-ndjson'];
            $response = $this->requestResponse('GET', $urlPath, $options, 200);
            $rows = $this->parseNdjson((string) $response->getBody());

            return empty($rows) ? null : new FiscalYears($rows, self::$logger);
        }, 'Searching FiscalYears');
    }

    public function get(ID|string|null $fiscalYearId = null): ?FiscalYear {
        if (is_null($fiscalYearId) || $fiscalYearId === '') {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Fiscal-Year-ID is required');
        }

        $id = $fiscalYearId instanceof ID ? $fiscalYearId->toString() : (string) $fiscalYearId;

        return $this->logDebugWithTimer(function () use ($id) {
            $urlPath = "{$this->getEndpointUrl()}/" . rawurlencode($id);
            $response = $this->requestResponse('GET', $urlPath, ['headers' => ['Accept' => 'application/x-ndjson']], 200);
            $rows = $this->parseNdjson((string) $response->getBody());

            return empty($rows) ? null : new FiscalYear($rows[0], self::$logger);
        }, "Fetching FiscalYear (ID: {$id})");
    }
}
