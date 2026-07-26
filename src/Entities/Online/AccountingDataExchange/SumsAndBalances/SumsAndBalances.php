<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SumsAndBalances.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDataExchange\SumsAndBalances;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use CommonToolkit\ValueObjects\Money;
use Datev\Traits\MoneyAccessorTrait;
use Psr\Log\LoggerInterface;

/**
 * Summen und Salden eines Kontos.
 */
class SumsAndBalances extends NamedEntity {
    use MoneyAccessorTrait;

    protected int $accountNumber;

    protected SumsAndBalancesMonthValues $sumsAndBalancesMonthValues;

    protected float $annualValueDebit;

    protected float $annualValueCredit;

    protected float $balance;

    protected string $balanceDebitCreditIdentifier;

    protected string $caption;

    protected float $openingBalanceDebit;

    protected float $openingBalanceCredit;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getAccountNumber(): ?int {
        return $this->accountNumber ?? null;
    }

    public function getSumsAndBalancesMonthValues(): ?SumsAndBalancesMonthValues {
        return $this->sumsAndBalancesMonthValues ?? null;
    }

    public function getAnnualValueDebit(): ?float {
        return $this->annualValueDebit ?? null;
    }

    public function getAnnualValueCredit(): ?float {
        return $this->annualValueCredit ?? null;
    }

    public function getBalance(): ?Money {
        return $this->toMoney($this->balance ?? null);
    }

    public function getBalanceDebitCreditIdentifier(): ?string {
        return $this->balanceDebitCreditIdentifier ?? null;
    }

    public function getCaption(): ?string {
        return $this->caption ?? null;
    }

    public function getOpeningBalanceDebit(): ?Money {
        return $this->toMoney($this->openingBalanceDebit ?? null);
    }

    public function getOpeningBalanceCredit(): ?Money {
        return $this->toMoney($this->openingBalanceCredit ?? null);
    }
}
