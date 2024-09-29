<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents;

use APIToolkit\Contracts\Abstracts\NamedValue;
use Psr\Log\LoggerInterface;

class ReceiptNumber extends NamedValue {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'receipt_number';
    }
}
