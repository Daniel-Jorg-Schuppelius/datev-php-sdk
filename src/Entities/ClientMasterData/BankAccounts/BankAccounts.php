<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\BankAccounts;

use Datev\Entities\Common\BankAccounts\BankAccounts as BaseBankAccounts;
use Psr\Log\LoggerInterface;

class BankAccounts extends BaseBankAccounts {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = BankAccount::class;

        parent::__construct($data, $logger);
    }
}
