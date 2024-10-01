<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\NameOfRegisterCourts;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class NameOfRegisterCourts extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = NameOfRegisterCourt::class;

        parent::__construct($data, $logger);
    }
}
