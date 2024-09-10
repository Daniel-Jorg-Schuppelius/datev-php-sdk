<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class EmploymentPeriod extends NamedEntity implements IdentifiableInterface {
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
}