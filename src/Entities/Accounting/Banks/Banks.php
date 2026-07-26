<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Banks.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\Banks;

use Datev\Entities\Common\BankAccounts\BankAccounts;
use Psr\Log\LoggerInterface;

/**
 * @extends BankAccounts<Bank>
 */
class Banks extends BankAccounts {
    /**
     * @param mixed $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Bank::class;

        parent::__construct($data, $logger);
    }
}
