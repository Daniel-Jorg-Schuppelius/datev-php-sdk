<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Insurances\Voluntary;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class VoluntaryInsurance extends NamedEntity implements IdentifiableInterface {
    protected VoluntaryInsuranceID $id;
    protected ?string $maximal_premium_for_voluntary_health_insurance;
    protected ?string $maximal_premium_for_voluntary_nursing_insurance;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): VoluntaryInsuranceID {
        return $this->id;
    }
}
