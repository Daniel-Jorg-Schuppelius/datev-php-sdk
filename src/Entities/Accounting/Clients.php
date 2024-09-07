<?php

declare(strict_types=1);

namespace Datev\Entities\Accounting;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Clients extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Client::class;

        parent::__construct($data, $logger);
    }
}
