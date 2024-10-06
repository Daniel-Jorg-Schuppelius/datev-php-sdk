<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PrivateInsurance.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\Insurances\Private;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class PrivateInsurance extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected PrivateInsuranceID $id;
    protected ?bool $is_private_health_insured;
    protected ?bool $is_private_nursing_insured;
    protected ?float $monthly_premium_for_private_health_insurance;
    protected ?float $monthly_premium_for_private_nursing_insurance;
    protected ?float $monthly_contribution_to_basic_health_insurance;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): PrivateInsuranceID {
        return $this->id;
    }

    public function isPrivateHealthInsured(): bool {
        return $this->is_private_health_insured ?? false;
    }

    public function isPrivateNursingInsured(): bool {
        return $this->is_private_nursing_insured ?? false;
    }

    public function getMonthlyPremiumForPrivateHealthInsurance(): ?float {
        return $this->monthly_premium_for_private_health_insurance ?? null;
    }

    public function getMonthlyPremiumForPrivateNursingInsurance(): ?float {
        return $this->monthly_premium_for_private_nursing_insurance ?? null;
    }

    public function getMonthlyContributionToBasicHealthInsurance(): ?float {
        return $this->monthly_contribution_to_basic_health_insurance ?? null;
    }
}
