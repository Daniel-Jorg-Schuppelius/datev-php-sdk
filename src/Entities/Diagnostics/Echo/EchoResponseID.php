<?php

declare(strict_types=1);

namespace Datev\Entities\Diagnostics\Echo;

use APIToolkit\Entities\ID;
use Psr\Log\LoggerInterface;

class EchoResponseID extends ID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'id';
    }
}
