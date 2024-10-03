<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\CorporateStructures;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class CorporateStructures extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = CorporateStructure::class;

        parent::__construct($data, $logger);
    }
}
