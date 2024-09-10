<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Employees\Accountable;

use DateTime;
use Datev\Entities\Payroll\Employees\Employee;
use Psr\Log\LoggerInterface;

class AccountableEmployee extends Employee {
    protected ?DateTime $date_of_termination_of_employment;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }
}