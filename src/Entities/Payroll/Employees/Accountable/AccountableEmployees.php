<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Employees\Accountable;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class AccountableEmployees extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = AccountableEmployee::class;

        parent::__construct($data, $logger);
    }
}