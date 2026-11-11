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
    protected ?int $additional_function;
    protected ?string $function_description;
    protected ?int $function_extension;
    protected ?int $main_function;
    protected ?int $main_function_number;
    protected ?TaxRates $tax_rates;

    /**
     * @param array<string, mixed>|object|null $data
     */
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

    public function getAdditionalFunction(): ?int {
        return $this->additional_function ?? null;
    }

    public function getFunctionDescription(): ?string {
        return $this->function_description ?? null;
    }

    public function getFunctionExtension(): ?int {
        return $this->function_extension ?? null;
    }

    public function getMainFunction(): ?int {
        return $this->main_function ?? null;
    }

    public function getMainFunctionNumber(): ?int {
        return $this->main_function_number ?? null;
    }

    public function getTaxRates(): ?TaxRates {
        return $this->tax_rates ?? null;
    }
}
