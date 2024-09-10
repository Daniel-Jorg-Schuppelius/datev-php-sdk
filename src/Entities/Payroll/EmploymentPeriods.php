<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class EmploymentPeriods extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = EmploymentPeriod::class;

        parent::__construct($data, $logger);
    }
}