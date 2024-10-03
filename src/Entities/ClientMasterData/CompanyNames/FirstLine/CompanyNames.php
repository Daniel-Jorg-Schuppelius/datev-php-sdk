<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\CompanyNames\FirstLine;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class CompanyNames extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = CompanyName::class;

        parent::__construct($data, $logger);
    }
}
