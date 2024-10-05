<?php

declare(strict_types=1);

namespace Datev\Entities\Accounting\Banks;

use Datev\Entities\Common\BankAccounts\BankAccounts;
use Psr\Log\LoggerInterface;

class Banks extends BankAccounts {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Bank::class;

        parent::__construct($data, $logger);
    }
}
