<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Registers;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Registers extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Register::class;

        parent::__construct($data, $logger);
    }
}
