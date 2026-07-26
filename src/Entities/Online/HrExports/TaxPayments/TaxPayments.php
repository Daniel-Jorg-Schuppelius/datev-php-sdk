<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TaxPayments.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExports\TaxPayments;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use CommonToolkit\ValueObjects\Money;
use Datev\Traits\MoneyAccessorTrait;
use Psr\Log\LoggerInterface;

/**
 * Steuerzahlungen eines Arbeitnehmers je Abrechnungsmonat.
 */
class TaxPayments extends NamedEntity {
    use MoneyAccessorTrait;

    protected int $personnel_number;

    protected string $company_personnel_number;

    protected string $accounting_month;

    protected string $month_of_recalculation;

    protected float $current_gross_tax;

    protected float $flat_rate_church_tax;

    protected float $flat_rate_solidarity_tax;

    protected float $flat_rate_wage_tax;

    protected float $flat_rate_taxed_payments;

    protected float $solidarity_tax;

    protected float $wage_tax;

    protected float $other_payments_taxed_at_flat_rate;

    protected float $payment_taxed_at_a_flat_rate_when_low_paid_employed;

    protected float $payment_taxed_at_a_flat_rate_when_short_term_employed;

    protected float $wage_tax_non_recurring_payment;

    protected float $wage_tax_monthly;

    protected float $church_tax_non_recurring_payment;

    protected float $church_tax;

    protected float $church_tax_monthly;

    protected float $tax_relevant_days;

    protected float $gross_tax_non_recurring_payment;

    protected float $tax_deductions;

    protected float $solidarity_tax_monthly;

    protected float $solidarity_tax_non_recurring_payment;

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

    public function getCurrentGrossTax(): ?Money {
        return $this->toMoney($this->current_gross_tax ?? null);
    }

    public function getFlatRateChurchTax(): ?float {
        return $this->flat_rate_church_tax ?? null;
    }

    public function getFlatRateSolidarityTax(): ?float {
        return $this->flat_rate_solidarity_tax ?? null;
    }

    public function getFlatRateWageTax(): ?float {
        return $this->flat_rate_wage_tax ?? null;
    }

    public function getFlatRateTaxedPayments(): ?float {
        return $this->flat_rate_taxed_payments ?? null;
    }

    public function getSolidarityTax(): ?Money {
        return $this->toMoney($this->solidarity_tax ?? null);
    }

    public function getWageTax(): ?Money {
        return $this->toMoney($this->wage_tax ?? null);
    }

    public function getOtherPaymentsTaxedAtFlatRate(): ?float {
        return $this->other_payments_taxed_at_flat_rate ?? null;
    }

    public function getPaymentTaxedAtAFlatRateWhenLowPaidEmployed(): ?float {
        return $this->payment_taxed_at_a_flat_rate_when_low_paid_employed ?? null;
    }

    public function getPaymentTaxedAtAFlatRateWhenShortTermEmployed(): ?float {
        return $this->payment_taxed_at_a_flat_rate_when_short_term_employed ?? null;
    }

    public function getWageTaxNonRecurringPayment(): ?Money {
        return $this->toMoney($this->wage_tax_non_recurring_payment ?? null);
    }

    public function getWageTaxMonthly(): ?Money {
        return $this->toMoney($this->wage_tax_monthly ?? null);
    }

    public function getChurchTaxNonRecurringPayment(): ?Money {
        return $this->toMoney($this->church_tax_non_recurring_payment ?? null);
    }

    public function getChurchTax(): ?Money {
        return $this->toMoney($this->church_tax ?? null);
    }

    public function getChurchTaxMonthly(): ?Money {
        return $this->toMoney($this->church_tax_monthly ?? null);
    }

    public function getTaxRelevantDays(): ?float {
        return $this->tax_relevant_days ?? null;
    }

    public function getGrossTaxNonRecurringPayment(): ?Money {
        return $this->toMoney($this->gross_tax_non_recurring_payment ?? null);
    }

    public function getTaxDeductions(): ?Money {
        return $this->toMoney($this->tax_deductions ?? null);
    }

    public function getSolidarityTaxMonthly(): ?Money {
        return $this->toMoney($this->solidarity_tax_monthly ?? null);
    }

    public function getSolidarityTaxNonRecurringPayment(): ?Money {
        return $this->toMoney($this->solidarity_tax_non_recurring_payment ?? null);
    }
}
