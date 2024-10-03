<?php

declare(strict_types=1);

namespace Datev\Entities\Common;

use Datev\Entities\ClientMasterData\Clients\ClientID as BaseClientID;
use Psr\Log\LoggerInterface;

class ClientID extends BaseClientID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'client_id';
    }
}
