<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\CountryCodes;

use APIToolkit\Entities\ID;
use Psr\Log\LoggerInterface;

class CountryCodeID extends ID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'id';
    }

    public function isValid(): bool {
        return is_string($this->value) && strlen($this->value) === 2;
    }
}
