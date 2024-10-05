<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Addressees\ID;

use Datev\Entities\ClientMasterData\Addressees\AddresseeID as BaseAddresseeID;
use Psr\Log\LoggerInterface;

class AddresseeID extends BaseAddresseeID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'addressee_id';
    }
}
