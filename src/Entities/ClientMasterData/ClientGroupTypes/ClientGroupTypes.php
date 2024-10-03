<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\ClientGroupTypes;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class ClientGroupTypes extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = ClientGroupType::class;

        parent::__construct($data, $logger);
    }
}
