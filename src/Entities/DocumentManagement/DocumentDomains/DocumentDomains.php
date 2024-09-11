<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\DocumentDomains;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class DocumentDomains extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = DocumentDomain::class;

        parent::__construct($data, $logger);
    }
}
