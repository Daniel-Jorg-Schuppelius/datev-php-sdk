<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\FederalStatesMAD;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class FederalStatesMAD extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = FederalStateMAD::class;

        parent::__construct($data, $logger);
    }
}
