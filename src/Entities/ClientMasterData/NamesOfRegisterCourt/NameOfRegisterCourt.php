<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\NamesOfRegisterCourt;

use Datev\Contracts\Abstracts\DateTimeNamedValue;
use Psr\Log\LoggerInterface;

class NameOfRegisterCourt extends DateTimeNamedValue {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'current_name_of_register_court';
    }
}
