<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Denominations;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class Denominations extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Denomination::class;

        parent::__construct($data, $logger);
    }
}
