<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BalanceType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums;

enum BalanceType: string {
    case BalancingByMeansOfPaymentsOrBankPosting = "balancing_by_means_of_payments_or_bank_posting";
    case ManualClearing = "manual_clearing";
    case ZeroBalanceRun = "zero_balance_run";
    case ReturnDebit = "return_debit";
    case SubsequentDivision = "subsequent_division";
}
