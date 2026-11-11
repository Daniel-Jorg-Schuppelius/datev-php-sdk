<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EvidenceType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums;

enum EvidenceType: string {
    case Invoice = "invoice";
    case CreditNote = "credit_note";
    case CreditNoteByRevocation = "credit_note_by_revocation";
    case Deposit = "deposit";
    case Payment = "payment";
    case CashDiscount = "cash_discount";
}
