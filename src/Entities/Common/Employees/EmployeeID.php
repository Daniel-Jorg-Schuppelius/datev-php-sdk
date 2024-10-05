<?php

declare(strict_types=1);

namespace Datev\Entities\Common\Employees;

use APIToolkit\Entities\ID;
use Psr\Log\LoggerInterface;

class EmployeeID extends ID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'id';
    }
}