<?php

declare(strict_types=1);

namespace Datev\Entities\Common\Errors;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Errors extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Error::class;

        parent::__construct($data, $logger);
    }
}
