<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\KindOfRegisterCourts;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class KindOfRegisterCourts extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = KindOfRegisterCourt::class;

        parent::__construct($data, $logger);
    }
}
