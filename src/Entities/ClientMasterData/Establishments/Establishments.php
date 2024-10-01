<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Establishments;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Establishments extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Establishment::class;

        parent::__construct($data, $logger);
    }
}
