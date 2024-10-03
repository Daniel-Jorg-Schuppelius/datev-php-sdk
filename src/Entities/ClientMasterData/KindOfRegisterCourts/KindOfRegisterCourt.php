<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\KindOfRegisterCourts;

use Datev\Contracts\Abstracts\DateTimeNamedValue;
use Psr\Log\LoggerInterface;

class KindOfRegisterCourt extends DateTimeNamedValue {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'current_kind_of_register_court';
    }
}
