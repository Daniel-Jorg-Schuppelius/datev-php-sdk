<?php

declare(strict_types=1);

namespace Datev\Entities\Diagnostics\Domains;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Domains extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Domain::class;

        parent::__construct($data, $logger);
    }
}
