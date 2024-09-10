<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Activities;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class Activity extends NamedEntity implements IdentifiableInterface {
    protected ActivityID $id;
    protected ?string $activity_type;
    protected ?string $employee_type;
    protected ?string $job_title;
    protected ?string $occupational_title;
    protected ?string $job_carried_out;
    protected ?string $contractual_structure;
    protected ?string $highest_level_of_education;
    protected ?string $highest_level_of_professional_training;
    protected ?string $personnel_leasing;
    protected ?string $individual_cost_center_id;
    protected ?string $individual_cost_unit_id;
    protected ?float $weekly_working_hours;
    protected ?float $allocation_of_working_hours_monday;
    protected ?float $allocation_of_working_hours_tuesday;
    protected ?float $allocation_of_working_hours_wednesday;
    protected ?float $allocation_of_working_hours_thursday;
    protected ?float $allocation_of_working_hours_friday;
    protected ?float $allocation_of_working_hours_saturday;
    protected ?float $allocation_of_working_hours_sunday;
    protected ?float $average_working_hours;
    protected ?string $form_of_remuneration;
    protected ?string $number_of_business_unit;
    protected ?string $department;
    protected ?int $employee_group_accounting;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ActivityID {
        return $this->id;
    }
}