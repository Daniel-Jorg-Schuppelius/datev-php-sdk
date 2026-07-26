<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SocialSecurity.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExports\MasterData;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Sozialversicherungsmerkmale des Arbeitnehmers.
 */
class SocialSecurity extends NamedEntity {
    protected string $contribution_class_health_insurance;

    protected string $contribution_class_pension_insurance;

    protected string $contribution_class_unemployment_insurance;

    protected string $contribution_class_long_term_care_insurance;

    protected string $person_group_key;

    protected string $is_ignore_additional_contribution_to_long_term_care_insurance_for_childless;

    protected string $health_insurance_company_number;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
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

    public function getContributionClassLongTermCareInsurance(): ?string {
        return $this->contribution_class_long_term_care_insurance ?? null;
    }

    public function getPersonGroupKey(): ?string {
        return $this->person_group_key ?? null;
    }

    public function getIsIgnoreAdditionalContributionToLongTermCareInsuranceForChildless(): ?string {
        return $this->is_ignore_additional_contribution_to_long_term_care_insurance_for_childless ?? null;
    }

    public function getHealthInsuranceCompanyNumber(): ?string {
        return $this->health_insurance_company_number ?? null;
    }
}
