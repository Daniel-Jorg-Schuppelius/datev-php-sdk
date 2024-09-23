<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\IndividualReferences;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class IndividualReferences extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = IndividualReference::class;

        parent::__construct($data, $logger);
    }
}
