<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\LocationsOfHeadOffice;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class LocationsOfHeadOffice extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = LocationOfHeadOffice::class;

        parent::__construct($data, $logger);
    }
}
