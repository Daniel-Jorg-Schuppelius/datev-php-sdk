<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AgriculturalFinancialStatement.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDataExchange\AgriculturalFinancialStatement;

/**
 * Landwirtschaftlicher Jahresabschluss (text/csv) inkl. der Response-Header
 * plausibility und timestamp.
 */
final class AgriculturalFinancialStatement {
    public function __construct(
        public readonly string $csv,
        public readonly ?string $plausibility = null,
        public readonly ?string $timestamp = null
    ) {}
}
