<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents\IndividualReferences;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class DocumentIndividualReferences extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = DocumentIndividualReference::class;

        parent::__construct($data, $logger);
    }
}
