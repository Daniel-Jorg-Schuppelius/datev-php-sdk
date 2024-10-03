<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\MaritalStatuses;

use Datev\Contracts\Abstracts\DateTimeNamedValue;
use Psr\Log\LoggerInterface;

class MaritalStatus extends DateTimeNamedValue {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'current_marital_status';
    }
}
