<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\StructureItems\Updates;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class StructureItemUpdates extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = StructureItemUpdate::class;

        parent::__construct($data, $logger);
    }
}
