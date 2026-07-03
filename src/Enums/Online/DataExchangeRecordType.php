<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DataExchangeRecordType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums\Online;

/**
 * Herkunftsart eines Buchungssatzes/-stapels im Accounting Data Exchange.
 */
enum DataExchangeRecordType: string {
    case FinancialAccounting = 'financial_accounting';
    case AnnualFinancialStatements = 'annual_financial_statements';
}
