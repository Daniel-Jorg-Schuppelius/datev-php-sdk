<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SalaryTotalValues.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExports\SalaryTotalValues;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Traits\MoneyAccessorTrait;
use CommonToolkit\ValueObjects\Money;
use Psr\Log\LoggerInterface;

/**
 * Gesamtwerte der Entgeltabrechnung je Abrechnungsmonat.
 */
class SalaryTotalValues extends NamedEntity {
    use MoneyAccessorTrait;

    protected int $personnel_number;

    protected string $company_personnel_number;

    protected string $accounting_month;

    protected string $month_of_recalculation;

    protected float $current_gross_payment;

    protected float $amount_paid;

    protected float $net_income;

    protected float $net_payments_and_net_deductions;

    protected float $total_statutory_deductions;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getPersonnelNumber(): ?int {
        return $this->personnel_number ?? null;
    }

    public function getCompanyPersonnelNumber(): ?string {
        return $this->company_personnel_number ?? null;
    }

    public function getAccountingMonth(): ?string {
        return $this->accounting_month ?? null;
    }

    public function getMonthOfRecalculation(): ?string {
        return $this->month_of_recalculation ?? null;
    }

    public function getCurrentGrossPayment(): ?Money {
        return $this->toMoney($this->current_gross_payment ?? null);
    }

    public function getAmountPaid(): ?Money {
        return $this->toMoney($this->amount_paid ?? null);
    }

    public function getNetIncome(): ?float {
        return $this->net_income ?? null;
    }

    public function getNetPaymentsAndNetDeductions(): ?Money {
        return $this->toMoney($this->net_payments_and_net_deductions ?? null);
    }

    public function getTotalStatutoryDeductions(): ?Money {
        return $this->toMoney($this->total_statutory_deductions ?? null);
    }
}
