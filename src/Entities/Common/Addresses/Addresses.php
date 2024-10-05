<?php

declare(strict_types=1);

namespace Datev\Entities\Common\Addresses;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Addresses extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        if (!isset($this->valueClassName))
            $this->valueClassName = Address::class;

        parent::__construct($data, $logger);
    }
}
