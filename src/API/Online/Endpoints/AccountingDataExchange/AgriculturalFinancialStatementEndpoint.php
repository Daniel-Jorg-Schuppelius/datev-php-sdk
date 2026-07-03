<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AgriculturalFinancialStatementEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\AccountingDataExchange;

use Datev\Contracts\Abstracts\API\Online\FiscalYearScopedEndpointAbstract;
use Datev\Entities\Online\AccountingDataExchange\AgriculturalFinancialStatement\AgriculturalFinancialStatement;

/**
 * Accounting Data Exchange v1: landwirtschaftlicher Jahresabschluss (text/csv).
 */
class AgriculturalFinancialStatementEndpoint extends FiscalYearScopedEndpointAbstract {
    protected string $endpointSuffix = 'agricultural-financial-statement';

    public function getStatement(): ?AgriculturalFinancialStatement {
        return $this->logDebugWithTimer(function () {
            $response = $this->getBinary(null, 'text/csv');
            $csv = (string) $response->getBody();

            if ($csv === '') {
                return null;
            }

            return new AgriculturalFinancialStatement(
                $csv,
                $response->getHeaderLine('plausibility') !== '' ? $response->getHeaderLine('plausibility') : null,
                $response->getHeaderLine('timestamp') !== '' ? $response->getHeaderLine('timestamp') : null
            );
        }, 'Fetching AgriculturalFinancialStatement');
    }
}
