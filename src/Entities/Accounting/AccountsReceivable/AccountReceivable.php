<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountReceivable.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\AccountsReceivable;

use DateTime;
use Datev\Entities\Accounting\OpenItems\BaseAccountOpenItem;
use Datev\Enums\BalanceType;
use Psr\Log\LoggerInterface;

class AccountReceivable extends BaseAccountOpenItem {
    protected ?BalanceType $balance_type;
    protected ?string $dunning_level;
    protected ?DateTime $dunning_date1;
    protected ?DateTime $dunning_date2;
    protected ?DateTime $dunning_date3;
    protected ?DateTime $enforcement_date;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }
}
