<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SumsAndBalancesQuantityAndWeight.php
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
 * Summen und Salden mit Menge und Gewicht eines Kontos.
 */
class SumsAndBalancesQuantityAndWeight extends NamedEntity {
    use MoneyAccessorTrait;

    protected int $accountNumber;

    protected string $caption;

    protected float $openingBalance;

    protected string $openingBalanceDebitCreditIdentifier;

    protected SumsAndBalancesQuantityAndWeightMonthValues $sumsAndBalancesQuantityAndWeightMonthValues;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getAccountNumber(): ?int {
        return $this->accountNumber ?? null;
    }

    public function getCaption(): ?string {
        return $this->caption ?? null;
    }

    public function getOpeningBalance(): ?Money {
        return $this->toMoney($this->openingBalance ?? null);
    }

    public function getOpeningBalanceDebitCreditIdentifier(): ?string {
        return $this->openingBalanceDebitCreditIdentifier ?? null;
    }

    public function getSumsAndBalancesQuantityAndWeightMonthValues(): ?SumsAndBalancesQuantityAndWeightMonthValues {
        return $this->sumsAndBalancesQuantityAndWeightMonthValues ?? null;
    }
}
