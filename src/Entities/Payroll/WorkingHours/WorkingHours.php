<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\WorkingHours;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class WorkingHours extends NamedEntity implements IdentifiableInterface {
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
}