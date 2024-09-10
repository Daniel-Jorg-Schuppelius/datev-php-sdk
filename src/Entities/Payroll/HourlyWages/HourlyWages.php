<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\HourlyWages;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class HourlyWages extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = HourlyWage::class;

        parent::__construct($data, $logger);
    }
}