<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents\PropertyTemplates;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class DocumentPropertyTemplates extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = DocumentPropertyTemplate::class;

        parent::__construct($data, $logger);
    }
}
