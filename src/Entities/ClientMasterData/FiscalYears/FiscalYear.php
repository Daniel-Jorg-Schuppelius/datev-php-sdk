<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\FiscalYears;

use Datev\Contracts\Abstracts\DateTimeNamedValue;
use Psr\Log\LoggerInterface;

class FiscalYear extends DateTimeNamedValue {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'current_fiscal_year';
    }
}
