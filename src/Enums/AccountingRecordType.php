<?php
/*
 * Created on   : Sat Nov 02 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingRecordType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums;

enum AccountingRecordType: string {
    case FinancialAccounting = "financial_accounting";
    case AnnualFinancialStatements = "annual_financial_statements";
}
