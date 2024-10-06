<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Insurances\Voluntary;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class VoluntaryInsurance extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected VoluntaryInsuranceID $id;
    protected ?string $maximal_premium_for_voluntary_health_insurance;
    protected ?string $maximal_premium_for_voluntary_nursing_insurance;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): VoluntaryInsuranceID {
        return $this->id;
    }

    public function getMaximalPremiumForVoluntaryHealthInsurance(): ?string {
        return $this->maximal_premium_for_voluntary_health_insurance ?? null;
    }

    public function getMaximalPremiumForVoluntaryNursingInsurance(): ?string {
        return $this->maximal_premium_for_voluntary_nursing_insurance ?? null;
    }
}
