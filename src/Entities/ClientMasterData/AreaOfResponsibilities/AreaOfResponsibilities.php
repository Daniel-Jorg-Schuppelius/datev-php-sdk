<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\AreaOfResponsibilities;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class AreaOfResponsibilities extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = AreaOfResponsibility::class;

        parent::__construct($data, $logger);
    }
}
