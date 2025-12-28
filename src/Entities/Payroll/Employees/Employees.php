<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Employees.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\Employees;

use Datev\Entities\Common\Employees\Employees as BaseEmployees;
use Psr\Log\LoggerInterface;

class Employees extends BaseEmployees {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Employee::class;

        parent::__construct($data, $logger);
    }
}
