<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\CountryCodes;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class CountryCodes extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = CountryCode::class;

        parent::__construct($data, $logger);
    }
}
