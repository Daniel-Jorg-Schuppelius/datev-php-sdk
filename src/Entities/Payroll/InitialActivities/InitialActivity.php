<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : InitialActivity.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\InitialActivities;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class InitialActivity extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected InitialActivityID $id;
    protected ?DateTime $reference_date;
    protected ?string $activity_type;
    protected ?string $employee_type;
    protected ?int $business_unit_id;
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

    public function getID(): InitialActivityID {
        return $this->id;
    }

    public function getReferenceDate(): ?DateTime {
        return $this->reference_date ?? null;
    }

    public function getActivityType(): ?string {
        return $this->activity_type ?? null;
    }

    public function getEmployeeType(): ?string {
        return $this->employee_type ?? null;
    }

    public function getBusinessUnitID(): ?int {
        return $this->business_unit_id ?? null;
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
