<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\RegisteredCompanyNames;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class RegisteredCompanyNames extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = RegisteredCompanyName::class;

        parent::__construct($data, $logger);
    }
}
