<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Considerations;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class Considerations extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Consideration::class;

        parent::__construct($data, $logger);
    }
}
