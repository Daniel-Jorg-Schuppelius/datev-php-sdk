<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\FinancialAccountings;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class FinancialAccountings extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = FinancialAccounting::class;

        parent::__construct($data, $logger);
    }
}