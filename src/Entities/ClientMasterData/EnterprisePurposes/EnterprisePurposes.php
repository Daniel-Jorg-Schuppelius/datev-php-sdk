<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\EnterprisePurposes;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class EnterprisePurposes extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = EnterprisePurpose::class;

        parent::__construct($data, $logger);
    }
}
