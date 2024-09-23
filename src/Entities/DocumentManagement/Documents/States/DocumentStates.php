<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents\States;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class DocumentStates extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = DocumentState::class;

        parent::__construct($data, $logger);
    }
}
