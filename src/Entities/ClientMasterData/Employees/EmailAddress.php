<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Employees;

use APIToolkit\Entities\Contact\EmailAddress as BaseEmailAddress;
use Psr\Log\LoggerInterface;

class EmailAddress extends BaseEmailAddress {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'email';
    }
}
