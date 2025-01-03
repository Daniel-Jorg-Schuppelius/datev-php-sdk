<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TaxationMethod.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums;

enum TaxationMethod: string {
    case NotSpecified = "not_specified";
    case TaxationBasedOnValueOfServicesRendered = "taxation_based_on_value_of_services_rendered";
    case TaxationBasedOnValueOfActualReceipts = "taxation_based_on_value_of_actual_receipts";
    case TaxationBasedOnValueOfActualReceiptsInputTaxDeductionAtPayment = "taxation_based_on_value_of_actual_receipts_input_tax_deduction_at_payment"; // AT Only
    case NoVatCalculation = "no_vat_calculation";
    case LumpSum = "lump_sum";
}
