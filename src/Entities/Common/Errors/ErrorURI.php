<?php

declare(strict_types=1);

namespace Datev\Entities\Common\Errors;

use APIToolkit\Entities\Information\Link;
use Psr\Log\LoggerInterface;

class ErrorURI extends Link {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'error_uri';
    }
}
