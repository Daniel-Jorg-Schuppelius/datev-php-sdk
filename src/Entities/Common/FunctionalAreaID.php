<?php

declare(strict_types=1);

namespace Datev\Entities\Common;

use Datev\Entities\ClientMasterData\FunctionalAreas\FunctionalAreaID as BaseFunctionalAreaID;
use Psr\Log\LoggerInterface;

class FunctionalAreaID extends BaseFunctionalAreaID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'functional_area_id';
    }
}
