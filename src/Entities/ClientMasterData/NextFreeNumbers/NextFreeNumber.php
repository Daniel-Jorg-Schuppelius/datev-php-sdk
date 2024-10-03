<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\NextFreeNumbers;

use Datev\Contracts\Abstracts\DateTimeNamedValue;
use Psr\Log\LoggerInterface;

class NextFreeNumber extends DateTimeNamedValue {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'current_next_free_number';
    }
}
