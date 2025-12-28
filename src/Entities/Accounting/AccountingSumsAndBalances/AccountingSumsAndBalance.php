<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingSumsAndBalance.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\AccountingSumsAndBalances;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class AccountingSumsAndBalance extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected AccountingSumsAndBalancesID $id;
    protected ?int $account_number;
    protected ?MonthValues $accounting_sums_and_balances_month_values;
    protected ?float $annual_value_debit;
    protected ?float $annual_value_credit;
    protected ?float $balance;
    protected ?string $balance_debit_credit_identifier;
    protected ?string $caption;
    protected ?float $opening_balance_sheet;
    protected ?string $opening_balance_sheet_debit_credit_identifier;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): AccountingSumsAndBalancesID {
        return $this->id;
    }

    public function getAccountNumber(): ?int {
        return $this->account_number ?? null;
    }

    public function getMonthValues(): ?MonthValues {
        return $this->accounting_sums_and_balances_month_values ?? null;
    }

    public function getAnnualValueDebit(): ?float {
        return $this->annual_value_debit ?? null;
    }

    public function getAnnualValueCredit(): ?float {
        return $this->annual_value_credit ?? null;
    }

    public function getBalance(): ?float {
        return $this->balance ?? null;
    }

    public function getBalanceDebitCreditIdentifier(): ?string {
        return $this->balance_debit_credit_identifier ?? null;
    }

    public function getCaption(): ?string {
        return $this->caption ?? null;
    }

    public function getOpeningBalanceSheet(): ?float {
        return $this->opening_balance_sheet ?? null;
    }

    public function getOpeningBalanceSheetDebitCreditIdentifier(): ?string {
        return $this->opening_balance_sheet_debit_credit_identifier ?? null;
    }
}
