<?php

declare(strict_types=1);

namespace Datev\Entities\Accounting;

use APIToolkit\Contracts\Abstracts\NamedValue;
use Psr\Log\LoggerInterface;

class CompanyData extends NamedValue {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = 'creditor_identifier';
        parent::__construct($data, $logger);
    }

    public function toArray(): array {
        if (is_null($this->value)) {
            return [];
        }
        return [
            $this->entityName => $this->value
        ];
    }
}
