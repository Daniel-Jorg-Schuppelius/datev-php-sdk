<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Activities;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Activities extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Activity::class;

        parent::__construct($data, $logger);
    }
}