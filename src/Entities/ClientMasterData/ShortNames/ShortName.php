<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\ShortNames;

use Datev\Contracts\Abstracts\DateTimeNamedValue;
use Psr\Log\LoggerInterface;

class ShortName extends DateTimeNamedValue {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'current_short_name';
    }
}
