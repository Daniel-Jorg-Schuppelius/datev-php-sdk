<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\BatchResponse\Failed;

use APIToolkit\Entities\ID;
use Psr\Log\LoggerInterface;

class RequestID extends ID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'request_id';
    }
}