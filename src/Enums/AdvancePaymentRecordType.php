<?php
/*
 * Created on   : Sat Nov 02 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AdvancePaymentRecordType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums;

enum AdvancePaymentRecordType: string {
    case RequestedAdvancePaymentOrInterimInvoice = "AA";
    case ReceivedAdvancePaymentCashReceipt = "AG";
    case FinalInvoice = "SR";
    case FinalInvoiceCashReceipt = "SG";
    case Other = "SO";
}
