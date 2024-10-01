<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Establishments;

use APIToolkit\Entities\ID;
use Psr\Log\LoggerInterface;

class EstablishmentID extends ID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'id';
    }
}
