<?php

declare(strict_types=1);

namespace Datev\Entities\Common;

use APIToolkit\Entities\GUID;
use Psr\Log\LoggerInterface;

class NaturalPersonID extends GUID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'natural_person_id';
    }
}
