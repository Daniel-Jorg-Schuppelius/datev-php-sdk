<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\IndividualProperties;

use APIToolkit\Entities\ID;
use Psr\Log\LoggerInterface;

class IndividualPropertyID extends ID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'id';
    }
}
