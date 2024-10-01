<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Employees;

use APIToolkit\Entities\Contact\PhoneNumber as BasePhoneNumber;
use Psr\Log\LoggerInterface;

class FaxNumber extends BasePhoneNumber {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'fax';
    }
}
