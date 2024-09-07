<?php

declare(strict_types=1);

namespace Datev\Entities;

use APIToolkit\Contracts\Abstracts\NamedValue;
use Psr\Log\LoggerInterface;

class ConsultantNumber extends NamedValue {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'consultant_number';
        $this->readOnly = true;
    }
}