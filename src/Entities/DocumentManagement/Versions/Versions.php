<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Versions;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Versions extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Version::class;

        parent::__construct($data, $logger);
    }
}
