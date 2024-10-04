<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\CountriesOfHeadOffice;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class CountriesOfHeadOffice extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = CountryOfHeadOffice::class;

        parent::__construct($data, $logger);
    }
}