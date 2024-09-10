<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\VacationEntitlements;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class VacationEntitlements extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = VacationEntitlement::class;

        parent::__construct($data, $logger);
    }
}