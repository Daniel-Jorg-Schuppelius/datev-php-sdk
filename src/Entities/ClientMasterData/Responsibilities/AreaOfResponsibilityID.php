<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Responsibilities;

use Datev\Entities\ClientMasterData\AreaOfResponsibilities\AreaOfResponsibilityID as BaseAreaOfResponsibilityID;
use Psr\Log\LoggerInterface;

class AreaOfResponsibilityID extends BaseAreaOfResponsibilityID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'area_of_responsibility_id';
    }
}
