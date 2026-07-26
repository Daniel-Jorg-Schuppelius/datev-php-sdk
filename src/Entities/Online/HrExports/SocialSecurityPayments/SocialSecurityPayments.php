<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SocialSecurityPayments.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExports\SocialSecurityPayments;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use CommonToolkit\ValueObjects\Money;
use Datev\Traits\MoneyAccessorTrait;
use Psr\Log\LoggerInterface;

/**
 * Sozialversicherungszahlungen eines Arbeitnehmers je Abrechnungsmonat.
 */
class SocialSecurityPayments extends NamedEntity {
    use MoneyAccessorTrait;

    protected int $personnel_number;

    protected string $company_personnel_number;

    protected string $accounting_month;

    protected string $month_of_recalculation;

    protected HealthInsurance $health_insurance;

    protected UnemploymentInsurance $unemployment_insurance;

    protected LongTermCareInsurance $long_term_care_insurance;

    protected PensionInsurance $pension_insurance;

    protected float $current_payments_to_social_security_employers_contribution;

    protected float $other_payments_to_social_security_employers_contribution;

    protected float $allocation1;

    protected float $allocation2;

    protected float $monthly_allocation_to_insolvency_benefit;

    protected float $allocation_insolvency;

    protected float $social_security_days;

    protected float $annual_allocation_to_insolvency_benefit;

    protected float $social_security_deductions;

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

    public function getHealthInsurance(): ?HealthInsurance {
        return $this->health_insurance ?? null;
    }

    public function getUnemploymentInsurance(): ?UnemploymentInsurance {
        return $this->unemployment_insurance ?? null;
    }

    public function getLongTermCareInsurance(): ?LongTermCareInsurance {
        return $this->long_term_care_insurance ?? null;
    }

    public function getPensionInsurance(): ?PensionInsurance {
        return $this->pension_insurance ?? null;
    }

    public function getCurrentPaymentsToSocialSecurityEmployersContribution(): ?Money {
        return $this->toMoney($this->current_payments_to_social_security_employers_contribution ?? null);
    }

    public function getOtherPaymentsToSocialSecurityEmployersContribution(): ?Money {
        return $this->toMoney($this->other_payments_to_social_security_employers_contribution ?? null);
    }

    public function getAllocation1(): ?float {
        return $this->allocation1 ?? null;
    }

    public function getAllocation2(): ?float {
        return $this->allocation2 ?? null;
    }

    public function getMonthlyAllocationToInsolvencyBenefit(): ?float {
        return $this->monthly_allocation_to_insolvency_benefit ?? null;
    }

    public function getAllocationInsolvency(): ?float {
        return $this->allocation_insolvency ?? null;
    }

    public function getSocialSecurityDays(): ?float {
        return $this->social_security_days ?? null;
    }

    public function getAnnualAllocationToInsolvencyBenefit(): ?float {
        return $this->annual_allocation_to_insolvency_benefit ?? null;
    }

    public function getSocialSecurityDeductions(): ?float {
        return $this->social_security_deductions ?? null;
    }
}
