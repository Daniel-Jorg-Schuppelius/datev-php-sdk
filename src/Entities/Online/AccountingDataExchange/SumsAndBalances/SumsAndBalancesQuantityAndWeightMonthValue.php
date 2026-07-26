<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SumsAndBalancesQuantityAndWeightMonthValue.php
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
 * Monatswert der Summen und Salden mit Menge und Gewicht.
 */
class SumsAndBalancesQuantityAndWeightMonthValue extends NamedEntity {
    use MoneyAccessorTrait;

    protected float $accumulatedBalance;

    protected string $accumulatedBalanceDebitCreditIdentifier;

    protected int $accumulatedQuantity;

    protected float $accumulatedWeight;

    protected float $averagePriceQuantity;

    protected float $averagePriceWeight;

    protected int $fiscalYearMonth;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getAccumulatedBalance(): ?Money {
        return $this->toMoney($this->accumulatedBalance ?? null);
    }

    public function getAccumulatedBalanceDebitCreditIdentifier(): ?string {
        return $this->accumulatedBalanceDebitCreditIdentifier ?? null;
    }

    public function getAccumulatedQuantity(): ?int {
        return $this->accumulatedQuantity ?? null;
    }

    public function getAccumulatedWeight(): ?float {
        return $this->accumulatedWeight ?? null;
    }

    public function getAveragePriceQuantity(): ?float {
        return $this->averagePriceQuantity ?? null;
    }

    public function getAveragePriceWeight(): ?Money {
        return $this->toMoney($this->averagePriceWeight ?? null);
    }

    public function getFiscalYearMonth(): ?int {
        return $this->fiscalYearMonth ?? null;
    }
}
