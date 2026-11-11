<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountsPayable.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\AccountsPayable;

use Datev\Entities\Accounting\OpenItems\OpenItems;

/**
 * @extends OpenItems<AccountPayable>
 */
class AccountsPayable extends OpenItems {
    protected string $valueClassName = AccountPayable::class;
}
