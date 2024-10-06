<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountableEmployee.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

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

    public function getDateOfTerminationOfEmployment(): ?DateTime {
        return $this->date_of_termination_of_employment;
    }
}
