<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\EnterprisePurposes;

use Datev\Contracts\Abstracts\DateTimeNamedValue;
use Psr\Log\LoggerInterface;

class EnterprisePurpose extends DateTimeNamedValue {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'current_enterprise_purpose';
    }
}
