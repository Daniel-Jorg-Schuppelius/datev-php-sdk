<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\StructureItems;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class StructureItems extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = StructureItem::class;

        parent::__construct($data, $logger);
    }
}
