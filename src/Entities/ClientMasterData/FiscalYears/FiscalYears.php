<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\FiscalYears;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class FiscalYears extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = FiscalYear::class;

        parent::__construct($data, $logger);
    }
}
