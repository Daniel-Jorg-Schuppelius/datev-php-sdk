<?php

declare(strict_types=1);

namespace Datev\Entities\Common;

use Datev\Entities\ClientMasterData\ClientGroupTypes\ClientGroupTypeID as BaseClientGroupTypeID;
use Psr\Log\LoggerInterface;

class ClientGroupTypeID extends BaseClientGroupTypeID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'client_group_type_id';
    }
}
