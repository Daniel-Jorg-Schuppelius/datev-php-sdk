<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Employees;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Employees extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Employee::class;

        parent::__construct($data, $logger);
    }
}