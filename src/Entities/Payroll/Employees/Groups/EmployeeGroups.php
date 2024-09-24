<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Employees\Groups;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class EmployeeGroups extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = EmployeeGroup::class;

        parent::__construct($data, $logger);
    }
}
