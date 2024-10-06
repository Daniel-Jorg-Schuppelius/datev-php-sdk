<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BankAccount.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\BankAccounts;

use Datev\Entities\Common\BankAccounts\BankAccount as BaseBankAccount;

class BankAccount extends BaseBankAccount {
    protected ?bool $currently_valid;
    protected ?bool $is_main_bank_account;

    public function isCurrentlyValid(): bool {
        return $this->currently_valid ?? false;
    }

    public function isMainBankAccount(): bool {
        return $this->is_main_bank_account ?? false;
    }
}
