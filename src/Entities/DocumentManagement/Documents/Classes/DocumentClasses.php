<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents\Classes;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class DocumentClasses extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = DocumentClass::class;

        parent::__construct($data, $logger);
    }
}
