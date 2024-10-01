<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\MaritalStatuses;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class MaritalStatuses extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = MaritalStatus::class;

        parent::__construct($data, $logger);
    }
}
