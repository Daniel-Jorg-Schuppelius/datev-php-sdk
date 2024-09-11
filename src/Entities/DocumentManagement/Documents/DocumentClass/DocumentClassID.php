<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents\DocumentClass;

use APIToolkit\Entities\ID;
use Psr\Log\LoggerInterface;

class DocumentClassID extends ID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'id';
    }
}
