<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Notes;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Notes extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Note::class;

        parent::__construct($data, $logger);
    }
}
