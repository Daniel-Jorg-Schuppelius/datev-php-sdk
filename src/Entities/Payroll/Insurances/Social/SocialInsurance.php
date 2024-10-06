<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SocialInsurance.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\Insurances\Social;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class SocialInsurance extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected SocialInsuranceID $id;
    protected ?string $contribution_class_health_insurance;
    protected ?string $contribution_class_pension_insurance;
    protected ?string $contribution_class_unemployment_insurance;
    protected ?string $contribution_class_nursing_insurance;
    protected ?bool $is_additional_contribution_to_nursing_insurance_for_childless_ignored;
    protected ?string $allocation_method;
    protected ?string $legal_treatment;
    protected ?string $company_number_of_health_insurer;
    protected ?string $branch_office_of_health_insurer;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): SocialInsuranceID {
        return $this->id;
    }

    public function getContributionClassHealthInsurance(): ?string {
        return $this->contribution_class_health_insurance ?? null;
    }

    public function getContributionClassPensionInsurance(): ?string {
        return $this->contribution_class_pension_insurance ?? null;
    }

    public function getContributionClassUnemploymentInsurance(): ?string {
        return $this->contribution_class_unemployment_insurance ?? null;
    }

    public function getContributionClassNursingInsurance(): ?string {
        return $this->contribution_class_nursing_insurance ?? null;
    }

    public function isAdditionalContributionToNursingInsuranceForChildlessIgnored(): bool {
        return $this->is_additional_contribution_to_nursing_insurance_for_childless_ignored ?? false;
    }

    public function getAllocationMethod(): ?string {
        return $this->allocation_method ?? null;
    }

    public function getLegalTreatment(): ?string {
        return $this->legal_treatment ?? null;
    }

    public function getCompanyNumberOfHealthInsurer(): ?string {
        return $this->company_number_of_health_insurer ?? null;
    }

    public function getBranchOfficeOfHealthInsurer(): ?string {
        return $this->branch_office_of_health_insurer ?? null;
    }
}
