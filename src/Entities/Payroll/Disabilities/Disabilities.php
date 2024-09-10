<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Disabilities;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Disabilities extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Disability::class;

        parent::__construct($data, $logger);
    }
}