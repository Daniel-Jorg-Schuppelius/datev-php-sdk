<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\WorkingHours;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class WorkingHours extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected WorkingHoursID $id;
    protected ?float $weekly_working_hours;
    protected ?float $allocation_of_working_hours_monday;
    protected ?float $allocation_of_working_hours_tuesday;
    protected ?float $allocation_of_working_hours_wednesday;
    protected ?float $allocation_of_working_hours_thursday;
    protected ?float $allocation_of_working_hours_friday;
    protected ?float $allocation_of_working_hours_saturday;
    protected ?float $allocation_of_working_hours_sunday;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): WorkingHoursID {
        return $this->id;
    }

    public function getWeeklyWorkingHours(): ?float {
        return $this->weekly_working_hours ?? null;
    }

    public function getAllocationOfWorkingHoursMonday(): ?float {
        return $this->allocation_of_working_hours_monday ?? null;
    }

    public function getAllocationOfWorkingHoursTuesday(): ?float {
        return $this->allocation_of_working_hours_tuesday ?? null;
    }

    public function getAllocationOfWorkingHoursWednesday(): ?float {
        return $this->allocation_of_working_hours_wednesday ?? null;
    }

    public function getAllocationOfWorkingHoursThursday(): ?float {
        return $this->allocation_of_working_hours_thursday ?? null;
    }

    public function getAllocationOfWorkingHoursFriday(): ?float {
        return $this->allocation_of_working_hours_friday ?? null;
    }

    public function getAllocationOfWorkingHoursSaturday(): ?float {
        return $this->allocation_of_working_hours_saturday ?? null;
    }

    public function getAllocationOfWorkingHoursSunday(): ?float {
        return $this->allocation_of_working_hours_sunday ?? null;
    }
}
