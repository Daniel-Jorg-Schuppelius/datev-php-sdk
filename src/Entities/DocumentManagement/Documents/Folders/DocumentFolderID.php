<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents\Folders;

use APIToolkit\Entities\ID;
use Psr\Log\LoggerInterface;

class DocumentFolderID extends ID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'id';
    }
}
