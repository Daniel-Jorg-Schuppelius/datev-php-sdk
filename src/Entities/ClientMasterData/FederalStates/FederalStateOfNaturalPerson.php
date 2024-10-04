<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\FederalStates;

use Psr\Log\LoggerInterface;

class FederalStateOfNaturalPerson extends FederalState {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'current_federal_state_of_natural_person';
    }
}
