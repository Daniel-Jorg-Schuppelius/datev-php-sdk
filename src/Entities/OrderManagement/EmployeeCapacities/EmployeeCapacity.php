<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeCapacity.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\EmployeeCapacities;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Entities\GUID;
use DateTime;
use Psr\Log\LoggerInterface;

class EmployeeCapacity extends NamedEntity {
    protected ?EmployeeCapacityID $id;
    protected ?GUID $employee_id;
    protected ?DateTime $date;
    protected ?float $total_hours_time_units;
    protected ?float $target_hours_time_units;
    protected ?float $predictable_overtime_hours_time_units;
    protected ?float $unpredictable_hours_time_units;
    protected ?float $planned_hours_time_units;
    protected ?float $spare_hours_time_units;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?EmployeeCapacityID {
        return $this->id ?? null;
    }

    public function getEmployeeId(): ?GUID {
        return $this->employee_id ?? null;
    }

    public function getDate(): ?DateTime {
        return $this->date ?? null;
    }

    public function getTotalHoursTimeUnits(): ?float {
        return $this->total_hours_time_units ?? null;
    }

    public function getTargetHoursTimeUnits(): ?float {
        return $this->target_hours_time_units ?? null;
    }

    public function getPredictableOvertimeHoursTimeUnits(): ?float {
        return $this->predictable_overtime_hours_time_units ?? null;
    }

    public function getUnpredictableHoursTimeUnits(): ?float {
        return $this->unpredictable_hours_time_units ?? null;
    }

    public function getPlannedHoursTimeUnits(): ?float {
        return $this->planned_hours_time_units ?? null;
    }

    public function getSpareHoursTimeUnits(): ?float {
        return $this->spare_hours_time_units ?? null;
    }
}
