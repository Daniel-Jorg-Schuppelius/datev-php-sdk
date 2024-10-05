<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\FederalStatesMAD;

use Psr\Log\LoggerInterface;

class FederalStateMADOfLegalPerson extends FederalStateMAD {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'current_federal_state_mad_of_legal_person';
    }
}
