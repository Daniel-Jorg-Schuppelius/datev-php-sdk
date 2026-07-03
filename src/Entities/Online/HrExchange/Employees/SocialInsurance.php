<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SocialInsurance.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Sozialversicherungsdaten des Arbeitnehmers.
 */
class SocialInsurance extends NamedEntity {
    protected int $contribution_class_health_insurance;

    protected int $contribution_class_nursing_insurance;

    protected int $contribution_class_pension_insurance;

    protected int $contribution_class_unemployment_insurance;

    protected string $company_number_of_health_insurer;

    protected int $health_insurance_id;

    protected bool $is_additional_contribution_to_nursing_insurance_for_childless_ignored;

    protected int $branch_office_of_health_insurer;

    protected string $health_insurer_for_marginal_employee;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getContributionClassHealthInsurance(): ?int {
        return $this->contribution_class_health_insurance ?? null;
    }

    public function getContributionClassNursingInsurance(): ?int {
        return $this->contribution_class_nursing_insurance ?? null;
    }

    public function getContributionClassPensionInsurance(): ?int {
        return $this->contribution_class_pension_insurance ?? null;
    }

    public function getContributionClassUnemploymentInsurance(): ?int {
        return $this->contribution_class_unemployment_insurance ?? null;
    }

    public function getCompanyNumberOfHealthInsurer(): ?string {
        return $this->company_number_of_health_insurer ?? null;
    }

    public function getHealthInsuranceId(): ?int {
        return $this->health_insurance_id ?? null;
    }

    public function isAdditionalContributionToNursingInsuranceForChildlessIgnored(): bool {
        return $this->is_additional_contribution_to_nursing_insurance_for_childless_ignored ?? false;
    }

    public function getBranchOfficeOfHealthInsurer(): ?int {
        return $this->branch_office_of_health_insurer ?? null;
    }

    public function getHealthInsurerForMarginalEmployee(): ?string {
        return $this->health_insurer_for_marginal_employee ?? null;
    }
}
