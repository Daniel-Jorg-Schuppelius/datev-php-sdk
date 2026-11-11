<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountPayable.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\AccountsPayable;

use Datev\Entities\Accounting\OpenItems\BaseAccountOpenItem;
use Datev\Enums\BalanceType;
use Psr\Log\LoggerInterface;

class AccountPayable extends BaseAccountOpenItem {
    // Gleiche Werteliste wie balance_type bei den Forderungen, anderer Feldname in der API.
    protected ?BalanceType $balancing_type;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }
}
