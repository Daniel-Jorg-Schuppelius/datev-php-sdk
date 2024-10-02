<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\ClientCategoryTypes;

use APIToolkit\Entities\GUID;
use Psr\Log\LoggerInterface;

class ClientCategoryTypeID extends GUID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'id';
    }
}
