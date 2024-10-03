<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Communications;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Communications extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Communication::class;

        parent::__construct($data, $logger);
    }
}
