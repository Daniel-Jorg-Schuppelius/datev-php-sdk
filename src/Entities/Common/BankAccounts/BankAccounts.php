<?php

declare(strict_types=1);

namespace Datev\Entities\Common\BankAccounts;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class BankAccounts extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        if (!isset($this->valueClassName))
            $this->valueClassName = BankAccount::class;

        parent::__construct($data, $logger);
    }
}
