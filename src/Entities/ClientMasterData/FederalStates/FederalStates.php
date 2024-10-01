<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\FederalStates;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class FederalStates extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = FederalState::class;

        parent::__construct($data, $logger);
    }
}
