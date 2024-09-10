<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Salaries;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Salaries extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Salary::class;

        parent::__construct($data, $logger);
    }
}