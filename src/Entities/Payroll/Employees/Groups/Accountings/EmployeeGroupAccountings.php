<?php
/*
 * Created on   : Sat Jan 04 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeGroupAccountings.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\Employees\Groups\Accountings;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

/**
 * @extends NamedValues<EmployeeGroupAccounting>
 */
class EmployeeGroupAccountings extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = EmployeeGroupAccounting::class;

        parent::__construct($data, $logger);
    }
}
