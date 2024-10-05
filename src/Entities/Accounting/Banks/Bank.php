<?php

declare(strict_types=1);

namespace Datev\Entities\Accounting\Banks;

use Datev\Entities\Common\BankAccounts\BankAccount;
use Psr\Log\LoggerInterface;

class Bank extends BankAccount {
    protected ?int $business_partner_bank_position;
    protected ?bool $is_business_partner_bank;
    protected ?string $sepa_mandate_reference;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }
}
