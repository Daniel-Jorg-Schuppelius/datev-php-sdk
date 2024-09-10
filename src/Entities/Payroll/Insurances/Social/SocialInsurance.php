<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Insurances\Social;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class SocialInsurance extends NamedEntity implements IdentifiableInterface {
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
}
