<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : UnemploymentInsurance.php
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
 * Beitragswerte der Versicherung (unemployment_insurance).
 */
class UnemploymentInsurance extends NamedEntity {
    use MoneyAccessorTrait;

    protected float $unemployment_insurance_monthly_contribution_employer;

    protected float $unemployment_insurance_employers_contribution_non_recurring_payment;

    protected float $unemployment_insurance_employees_contribution_non_recurring_payment;

    protected float $unemployment_insurance_monthly_contribution_employee;

    protected float $unemployment_insurance_gross;

    protected float $unemployment_insurance_gross_non_recurring_payment;

    protected float $unemployment_insurance_gross_monthly_contribution;

    protected float $unemployment_insurance_employees_contribution_total;

    protected float $unemployment_insurance_employer_contribution_total;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getUnemploymentInsuranceMonthlyContributionEmployer(): ?float {
        return $this->unemployment_insurance_monthly_contribution_employer ?? null;
    }

    public function getUnemploymentInsuranceEmployersContributionNonRecurringPayment(): ?float {
        return $this->unemployment_insurance_employers_contribution_non_recurring_payment ?? null;
    }

    public function getUnemploymentInsuranceEmployeesContributionNonRecurringPayment(): ?float {
        return $this->unemployment_insurance_employees_contribution_non_recurring_payment ?? null;
    }

    public function getUnemploymentInsuranceMonthlyContributionEmployee(): ?float {
        return $this->unemployment_insurance_monthly_contribution_employee ?? null;
    }

    public function getUnemploymentInsuranceGross(): ?float {
        return $this->unemployment_insurance_gross ?? null;
    }

    public function getUnemploymentInsuranceGrossNonRecurringPayment(): ?float {
        return $this->unemployment_insurance_gross_non_recurring_payment ?? null;
    }

    public function getUnemploymentInsuranceGrossMonthlyContribution(): ?float {
        return $this->unemployment_insurance_gross_monthly_contribution ?? null;
    }

    public function getUnemploymentInsuranceEmployeesContributionTotal(): ?Money {
        return $this->toMoney($this->unemployment_insurance_employees_contribution_total ?? null);
    }

    public function getUnemploymentInsuranceEmployerContributionTotal(): ?Money {
        return $this->toMoney($this->unemployment_insurance_employer_contribution_total ?? null);
    }
}
