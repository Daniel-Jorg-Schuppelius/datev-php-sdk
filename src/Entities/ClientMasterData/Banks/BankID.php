<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Banks;

use APIToolkit\Entities\ID;
use Psr\Log\LoggerInterface;

class BankID extends ID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'id';
    }
}
