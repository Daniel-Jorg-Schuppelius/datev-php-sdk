<?php

declare(strict_types=1);

namespace Datev\Entities\Common;

use Datev\Entities\ClientMasterData\CountryCodes\CountryCodeID;
use Psr\Log\LoggerInterface;

class CountryCode extends CountryCodeID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'country_code';
    }
}
