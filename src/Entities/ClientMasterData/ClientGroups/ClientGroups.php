<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\ClientGroups;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class ClientGroups extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = ClientGroup::class;

        parent::__construct($data, $logger);
    }
}
