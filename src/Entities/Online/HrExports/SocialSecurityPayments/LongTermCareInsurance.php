<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LongTermCareInsurance.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExports\SocialSecurityPayments;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Traits\MoneyAccessorTrait;
use CommonToolkit\ValueObjects\Money;
use Psr\Log\LoggerInterface;

/**
 * Beitragswerte der Versicherung (long_term_care_insurance).
 */
class LongTermCareInsurance extends NamedEntity {
    use MoneyAccessorTrait;

    protected float $long_term_care_insurance_monthly_contribution_employer;

    protected float $long_term_care_insurance_employers_contribution_non_recurring_payment;

    protected float $long_term_care_insurance_employees_contribution_non_recurring_payment;

    protected float $long_term_care_insurance_monthly_contribution_employee;

    protected float $long_term_care_insurance_gross;

    protected float $long_term_care_insurance_gross_non_recurring_payment;

    protected float $long_term_care_insurance_gross_monthly_contribution;

    protected float $long_term_care_insurance_employees_contribution_total;

    protected float $long_term_care_insurance_employer_contribution_total;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getLongTermCareInsuranceMonthlyContributionEmployer(): ?Money {
        return $this->toMoney($this->long_term_care_insurance_monthly_contribution_employer ?? null);
    }

    public function getLongTermCareInsuranceEmployersContributionNonRecurringPayment(): ?Money {
        return $this->toMoney($this->long_term_care_insurance_employers_contribution_non_recurring_payment ?? null);
    }

    public function getLongTermCareInsuranceEmployeesContributionNonRecurringPayment(): ?Money {
        return $this->toMoney($this->long_term_care_insurance_employees_contribution_non_recurring_payment ?? null);
    }

    public function getLongTermCareInsuranceMonthlyContributionEmployee(): ?Money {
        return $this->toMoney($this->long_term_care_insurance_monthly_contribution_employee ?? null);
    }

    public function getLongTermCareInsuranceGross(): ?Money {
        return $this->toMoney($this->long_term_care_insurance_gross ?? null);
    }

    public function getLongTermCareInsuranceGrossNonRecurringPayment(): ?Money {
        return $this->toMoney($this->long_term_care_insurance_gross_non_recurring_payment ?? null);
    }

    public function getLongTermCareInsuranceGrossMonthlyContribution(): ?Money {
        return $this->toMoney($this->long_term_care_insurance_gross_monthly_contribution ?? null);
    }

    public function getLongTermCareInsuranceEmployeesContributionTotal(): ?Money {
        return $this->toMoney($this->long_term_care_insurance_employees_contribution_total ?? null);
    }

    public function getLongTermCareInsuranceEmployerContributionTotal(): ?Money {
        return $this->toMoney($this->long_term_care_insurance_employer_contribution_total ?? null);
    }
}
