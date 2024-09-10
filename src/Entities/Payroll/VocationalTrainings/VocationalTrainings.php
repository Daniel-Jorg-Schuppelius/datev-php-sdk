<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\VocationalTrainings;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class VocationalTrainings extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = VocationalTraining::class;

        parent::__construct($data, $logger);
    }
}