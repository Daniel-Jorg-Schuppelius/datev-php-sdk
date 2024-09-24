<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\States;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class States extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = State::class;

        parent::__construct($data, $logger);
    }
}
