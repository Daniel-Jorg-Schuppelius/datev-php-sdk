<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Employees;

use Datev\Entities\Common\Employees\Employees as BaseEmployees;
use Psr\Log\LoggerInterface;

class Employees extends BaseEmployees {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Employee::class;

        parent::__construct($data, $logger);
    }
}
