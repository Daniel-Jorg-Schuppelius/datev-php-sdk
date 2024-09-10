<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Taxations;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Taxations extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Taxation::class;

        parent::__construct($data, $logger);
    }
}