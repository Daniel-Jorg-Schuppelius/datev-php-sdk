<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Surnames;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class Surnames extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Surname::class;

        parent::__construct($data, $logger);
    }
}
