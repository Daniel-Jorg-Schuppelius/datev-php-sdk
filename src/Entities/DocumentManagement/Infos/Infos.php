<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Infos;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Infos extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Info::class;

        parent::__construct($data, $logger);
    }
}
