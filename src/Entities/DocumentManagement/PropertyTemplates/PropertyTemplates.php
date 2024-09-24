<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\PropertyTemplates;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class PropertyTemplates extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = PropertyTemplate::class;

        parent::__construct($data, $logger);
    }
}
