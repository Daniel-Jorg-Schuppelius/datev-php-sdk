<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\DispatcherInformations;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class DispatcherInformations extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = DispatcherInformation::class;

        parent::__construct($data, $logger);
    }
}
