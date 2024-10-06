<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Bank.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

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
