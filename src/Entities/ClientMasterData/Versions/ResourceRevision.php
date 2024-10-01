<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Versions;

use APIToolkit\Entities\ProgramVersion;
use Psr\Log\LoggerInterface;

class ResourceRevision extends ProgramVersion {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'resource_revision';
    }
}
