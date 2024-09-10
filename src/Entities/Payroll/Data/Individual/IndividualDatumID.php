<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Data\Individual;

use APIToolkit\Entities\ID;
use Psr\Log\LoggerInterface;

class IndividualDatumID extends ID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'id';
    }
}