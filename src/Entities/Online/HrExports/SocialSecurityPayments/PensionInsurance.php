<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PensionInsurance.php
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
 * Beitragswerte der Versicherung (pension_insurance).
 */
class PensionInsurance extends NamedEntity {
    use MoneyAccessorTrait;

    protected float $pension_insurance_monthly_contribution_employer;

    protected float $pension_insurance_employers_contribution_non_recurring_payment;

    protected float $pension_insurance_employees_contribution_non_recurring_payment;

    protected float $pension_insurance_monthly_contribution_employee;

    protected float $pension_insurance_gross;

    protected float $pension_insurance_gross_non_recurring_payment;

    protected float $pension_insurance_gross_monthly_contribution;

    protected float $pension_insurance_employees_contribution_total;

    protected float $pension_insurance_employer_contribution_total;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getPensionInsuranceMonthlyContributionEmployer(): ?float {
        return $this->pension_insurance_monthly_contribution_employer ?? null;
    }

    public function getPensionInsuranceEmployersContributionNonRecurringPayment(): ?float {
        return $this->pension_insurance_employers_contribution_non_recurring_payment ?? null;
    }

    public function getPensionInsuranceEmployeesContributionNonRecurringPayment(): ?float {
        return $this->pension_insurance_employees_contribution_non_recurring_payment ?? null;
    }

    public function getPensionInsuranceMonthlyContributionEmployee(): ?float {
        return $this->pension_insurance_monthly_contribution_employee ?? null;
    }

    public function getPensionInsuranceGross(): ?float {
        return $this->pension_insurance_gross ?? null;
    }

    public function getPensionInsuranceGrossNonRecurringPayment(): ?float {
        return $this->pension_insurance_gross_non_recurring_payment ?? null;
    }

    public function getPensionInsuranceGrossMonthlyContribution(): ?float {
        return $this->pension_insurance_gross_monthly_contribution ?? null;
    }

    public function getPensionInsuranceEmployeesContributionTotal(): ?Money {
        return $this->toMoney($this->pension_insurance_employees_contribution_total ?? null);
    }

    public function getPensionInsuranceEmployerContributionTotal(): ?Money {
        return $this->toMoney($this->pension_insurance_employer_contribution_total ?? null);
    }
}
