<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Activity.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Tätigkeitsdaten des Arbeitnehmers.
 */
class Activity extends NamedEntity {
    protected int $highest_level_of_professional_training;

    protected int $highest_level_of_education;

    protected float $allocation_of_working_hours_monday;

    protected float $allocation_of_working_hours_tuesday;

    protected float $allocation_of_working_hours_wednesday;

    protected float $allocation_of_working_hours_thursday;

    protected float $allocation_of_working_hours_friday;

    protected float $allocation_of_working_hours_saturday;

    protected float $allocation_of_working_hours_sunday;

    protected float $weekly_working_hours;

    protected string $individual_cost_center_id;

    protected string $occupational_title;

    protected string $job_carried_out;

    protected string $employee_type;

    protected string $contractual_structure;

    protected int $activity_type;

    protected string $department_id;

    protected int $personnel_leasing;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getHighestLevelOfProfessionalTraining(): ?int {
        return $this->highest_level_of_professional_training ?? null;
    }

    public function getHighestLevelOfEducation(): ?int {
        return $this->highest_level_of_education ?? null;
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

    public function getWeeklyWorkingHours(): ?float {
        return $this->weekly_working_hours ?? null;
    }

    public function getIndividualCostCenterId(): ?string {
        return $this->individual_cost_center_id ?? null;
    }

    public function getOccupationalTitle(): ?string {
        return $this->occupational_title ?? null;
    }

    public function getJobCarriedOut(): ?string {
        return $this->job_carried_out ?? null;
    }

    public function getEmployeeType(): ?string {
        return $this->employee_type ?? null;
    }

    public function getContractualStructure(): ?string {
        return $this->contractual_structure ?? null;
    }

    public function getActivityType(): ?int {
        return $this->activity_type ?? null;
    }

    public function getDepartmentId(): ?string {
        return $this->department_id ?? null;
    }

    public function getPersonnelLeasing(): ?int {
        return $this->personnel_leasing ?? null;
    }
}
