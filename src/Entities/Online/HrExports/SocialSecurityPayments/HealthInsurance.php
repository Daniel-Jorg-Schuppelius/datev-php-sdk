<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HealthInsurance.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExports\SocialSecurityPayments;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Beitragswerte der Versicherung (health_insurance).
 */
class HealthInsurance extends NamedEntity {
    protected float $health_insurance_monthly_contribution_employer;

    protected float $health_insurance_employers_contribution_non_recurring_payment;

    protected float $health_insurance_employees_contribution_non_recurring_payment;

    protected float $health_insurance_monthly_contribution_employee;

    protected float $health_insurance_gross;

    protected float $health_insurance_gross_non_recurring_payment;

    protected float $health_insurance_gross_monthly_contribution;

    protected float $health_insurance_employees_contribution_total;

    protected float $health_insurance_employer_contribution_total;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getHealthInsuranceMonthlyContributionEmployer(): ?float {
        return $this->health_insurance_monthly_contribution_employer ?? null;
    }

    public function getHealthInsuranceEmployersContributionNonRecurringPayment(): ?float {
        return $this->health_insurance_employers_contribution_non_recurring_payment ?? null;
    }

    public function getHealthInsuranceEmployeesContributionNonRecurringPayment(): ?float {
        return $this->health_insurance_employees_contribution_non_recurring_payment ?? null;
    }

    public function getHealthInsuranceMonthlyContributionEmployee(): ?float {
        return $this->health_insurance_monthly_contribution_employee ?? null;
    }

    public function getHealthInsuranceGross(): ?float {
        return $this->health_insurance_gross ?? null;
    }

    public function getHealthInsuranceGrossNonRecurringPayment(): ?float {
        return $this->health_insurance_gross_non_recurring_payment ?? null;
    }

    public function getHealthInsuranceGrossMonthlyContribution(): ?float {
        return $this->health_insurance_gross_monthly_contribution ?? null;
    }

    public function getHealthInsuranceEmployeesContributionTotal(): ?float {
        return $this->health_insurance_employees_contribution_total ?? null;
    }

    public function getHealthInsuranceEmployerContributionTotal(): ?float {
        return $this->health_insurance_employer_contribution_total ?? null;
    }
}
