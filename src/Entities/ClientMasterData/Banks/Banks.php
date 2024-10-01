<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Banks;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Banks extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Bank::class;

        parent::__construct($data, $logger);
    }
}
