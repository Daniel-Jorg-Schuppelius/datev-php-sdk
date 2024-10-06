<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\EmploymentPeriods;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class EmploymentPeriod extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?EmploymentPeriodID $id;
    protected ?string $personnel_number;
    protected ?DateTime $date_of_commencement_of_employment;
    protected ?DateTime $date_of_termination_of_employment;
    protected ?DateTime $date_of_death;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): EmploymentPeriodID {
        return $this->id;
    }

    public function getPersonnelNumber(): ?string {
        return $this->personnel_number ?? null;
    }

    public function getDateOfCommencementOfEmployment(): ?DateTime {
        return $this->date_of_commencement_of_employment ?? null;
    }

    public function getDateOfTerminationOfEmployment(): ?DateTime {
        return $this->date_of_termination_of_employment ?? null;
    }

    public function getDateOfDeath(): ?DateTime {
        return $this->date_of_death ?? null;
    }
}
