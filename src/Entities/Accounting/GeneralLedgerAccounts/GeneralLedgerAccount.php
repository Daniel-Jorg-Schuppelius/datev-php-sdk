<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GeneralLedgerAccount.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\GeneralLedgerAccounts;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class GeneralLedgerAccount extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected GeneralLedgerAccountID $id;
    protected ?int $account_number;
    protected ?string $caption;
    protected ?int $accounting_transaction_key;
    protected ?string $account_function;
    protected ?bool $is_locked;
    protected ?DateTime $date_last_modification;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): GeneralLedgerAccountID {
        return $this->id;
    }

    public function getAccountNumber(): ?int {
        return $this->account_number ?? null;
    }

    public function getCaption(): ?string {
        return $this->caption ?? null;
    }

    public function getAccountingTransactionKey(): ?int {
        return $this->accounting_transaction_key ?? null;
    }

    public function getAccountFunction(): ?string {
        return $this->account_function ?? null;
    }

    public function isLocked(): ?bool {
        return $this->is_locked ?? null;
    }

    public function getDateLastModification(): ?DateTime {
        return $this->date_last_modification ?? null;
    }
}
