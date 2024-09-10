<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\FinancialAccountings;

use APIToolkit\Entities\ID;
use Psr\Log\LoggerInterface;

class FinancialAccountingID extends ID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'id';
    }
}