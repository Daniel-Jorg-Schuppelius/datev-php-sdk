<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DxsoImportType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums\Online;

/**
 * Importtyp eines DXSO-Jobs (accounting:dxso-jobs).
 */
enum DxsoImportType: string {
    case AccountsPayableLedgerImport = 'accountsPayableLedgerImport';
    case AccountsReceivableLedgerImport = 'accountsReceivableLedgerImport';
    case CashLedgerImport = 'cashLedgerImport';
}
