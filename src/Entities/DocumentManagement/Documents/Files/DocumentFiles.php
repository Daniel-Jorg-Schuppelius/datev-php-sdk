<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents\Files;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class DocumentFiles extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = DocumentFile::class;

        parent::__construct($data, $logger);
    }
}
