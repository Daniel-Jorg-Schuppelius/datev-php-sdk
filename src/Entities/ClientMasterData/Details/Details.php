<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Details;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Details extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Detail::class;

        parent::__construct($data, $logger);
    }
}
