<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Employees;

use Datev\Entities\ClientMasterData\Establishments\EstablishmentID as BaseEstablishmentID;
use Psr\Log\LoggerInterface;

class EstablishmentID extends BaseEstablishmentID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'establishment_id';
    }
}
