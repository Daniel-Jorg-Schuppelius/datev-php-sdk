<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Accounts;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Accounts extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Account::class;

        parent::__construct($data, $logger);
    }
}