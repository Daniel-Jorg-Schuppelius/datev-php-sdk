<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\RegistrationNumbers;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class RegistrationNumbers extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = RegistrationNumber::class;

        parent::__construct($data, $logger);
    }
}
