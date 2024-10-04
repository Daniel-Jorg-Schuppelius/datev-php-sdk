<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Responsibilities;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Responsibilities extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Responsibility::class;

        parent::__construct($data, $logger);
    }
}