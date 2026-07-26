<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SumsAndBalancesMonthValue.php
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
 * Monatswert der Summen und Salden.
 */
class SumsAndBalancesMonthValue extends NamedEntity {
    use MoneyAccessorTrait;

    protected float $monthlyBalance;

    protected string $monthlyBalanceDebitCreditIdentifier;

    protected int $fiscalYearMonth;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getMonthlyBalance(): ?Money {
        return $this->toMoney($this->monthlyBalance ?? null);
    }

    public function getMonthlyBalanceDebitCreditIdentifier(): ?string {
        return $this->monthlyBalanceDebitCreditIdentifier ?? null;
    }

    public function getFiscalYearMonth(): ?int {
        return $this->fiscalYearMonth ?? null;
    }
}
