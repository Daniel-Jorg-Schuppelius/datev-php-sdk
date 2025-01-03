<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingReason.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums;

enum AccountingReason: string {
    case IndependentFromAccountingReason = "independent_from_accounting_reason";
    case Reserved1 = "reserved_1";
    case Reserved2 = "reserved_2";
    case CommercialLaw = "commercial_law";
    case TaxLaw = "tax_law";
    case InternationalAccountingStandards = "international_accounting_standards";
    case ForCalculation = "for_calculation";
}
