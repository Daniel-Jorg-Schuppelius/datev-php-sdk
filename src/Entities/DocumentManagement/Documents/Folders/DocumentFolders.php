<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents\Folders;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class DocumentFolders extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = DocumentFolder::class;

        parent::__construct($data, $logger);
    }
}
