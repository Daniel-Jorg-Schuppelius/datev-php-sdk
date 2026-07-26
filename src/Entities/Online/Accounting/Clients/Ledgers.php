<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Ledgers.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\Accounting\Clients;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Verfügbarkeit der Buchführungs-Teilbereiche eines Mandanten.
 */
class Ledgers extends NamedEntity {
    protected bool $is_accounts_payable_ledger_available;

    protected bool $is_accounts_receivable_ledger_available;

    protected bool $is_cash_ledger_available;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function isAccountsPayableLedgerAvailable(): bool {
        return $this->is_accounts_payable_ledger_available ?? false;
    }

    public function isAccountsReceivableLedgerAvailable(): bool {
        return $this->is_accounts_receivable_ledger_available ?? false;
    }

    public function isCashLedgerAvailable(): bool {
        return $this->is_cash_ledger_available ?? false;
    }
}
