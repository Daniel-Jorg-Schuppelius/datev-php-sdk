<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents;

use APIToolkit\Entities\GUID;
use Psr\Log\LoggerInterface;

class DocumentID extends GUID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'id';
    }
}
