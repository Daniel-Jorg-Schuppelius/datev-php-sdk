<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountsReceivable.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\AccountsReceivable;

use Datev\Entities\Accounting\OpenItems\OpenItems;

/**
 * @extends OpenItems<AccountReceivable>
 */
class AccountsReceivable extends OpenItems {
    protected string $valueClassName = AccountReceivable::class;
}
