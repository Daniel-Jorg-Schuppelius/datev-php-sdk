<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\CostUnits;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class CostUnits extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = CostUnit::class;

        parent::__construct($data, $logger);
    }
}