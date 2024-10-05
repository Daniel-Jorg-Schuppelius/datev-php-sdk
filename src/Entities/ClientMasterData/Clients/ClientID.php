<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Clients;

use APIToolkit\Entities\GUID;
use Psr\Log\LoggerInterface;

class ClientID extends GUID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'id';
    }
}
