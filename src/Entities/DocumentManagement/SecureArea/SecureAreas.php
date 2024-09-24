<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\SecureAreas;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class SecureAreas extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = SecureArea::class;

        parent::__construct($data, $logger);
    }
}
