<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BankAccounts.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\BankAccounts;

use Datev\Entities\Common\BankAccounts\BankAccounts as BaseBankAccounts;
use Psr\Log\LoggerInterface;

/**
 * @extends BaseBankAccounts<BankAccount>
 */
class BankAccounts extends BaseBankAccounts {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = BankAccount::class;

        parent::__construct($data, $logger);
    }
}
