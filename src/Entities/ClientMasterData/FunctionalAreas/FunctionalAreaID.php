<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\FunctionalAreas;

use APIToolkit\Entities\GUID;
use Psr\Log\LoggerInterface;

class FunctionalAreaID extends GUID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'id';
    }
}
