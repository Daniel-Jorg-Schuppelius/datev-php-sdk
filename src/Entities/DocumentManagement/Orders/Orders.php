<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Orders;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Orders extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Order::class;

        parent::__construct($data, $logger);
    }
}
