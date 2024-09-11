<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\BatchResponse\Succeeded;

use APIToolkit\Entities\ID;
use Psr\Log\LoggerInterface;

class CreatedID extends ID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }
}
