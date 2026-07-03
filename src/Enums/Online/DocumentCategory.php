<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentCategory.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums\Online;

/**
 * Belegkategorie in accounting:documents (Belegbilderservice).
 */
enum DocumentCategory: string {
    case InvoicesReceived = 'invoices_received';
    case OutgoingInvoices = 'outgoing_invoices';
    case PersonnelDocuments = 'personnel_documents';
    case TravelExpenseDocuments = 'travel_expense_documents';
    case OtherDocuments = 'other_documents';
}
