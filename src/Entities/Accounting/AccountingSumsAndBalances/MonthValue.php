<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MonthValue.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\AccountingSumsAndBalances;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use CommonToolkit\ValueObjects\Money;
use Datev\Traits\MoneyAccessorTrait;
use Psr\Log\LoggerInterface;

class MonthValue extends NamedEntity {
    use MoneyAccessorTrait;

    protected ?float $monthly_balance;
    protected ?string $debit_credit_identifier;
    protected ?float $month_debit;
    protected ?float $month_credit;
    protected ?int $month;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getMonthlyBalance(): ?Money {
        return $this->toMoney($this->monthly_balance ?? null);
    }

    public function getDebitCreditIdentifier(): ?string {
        return $this->debit_credit_identifier ?? null;
    }

    public function getMonthDebit(): ?float {
        return $this->month_debit ?? null;
    }

    public function getMonthCredit(): ?float {
        return $this->month_credit ?? null;
    }

    public function getMonth(): ?int {
        return $this->month ?? null;
    }
}
