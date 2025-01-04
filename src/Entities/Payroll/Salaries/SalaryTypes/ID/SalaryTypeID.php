<?php
/*
 * Created on   : Sat Jan 04 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SalaryTypeID.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */


declare(strict_types=1);

namespace Datev\Entities\Payroll\Salaries\SalaryTypes\ID;

use Datev\Entities\Payroll\Salaries\SalaryTypes\SalaryTypeID as BaseSalaryTypeID;
use Psr\Log\LoggerInterface;

class SalaryTypeID extends BaseSalaryTypeID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'salary_type_id';
    }
}
