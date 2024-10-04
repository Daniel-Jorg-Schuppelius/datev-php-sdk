<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Addressees;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Addressees extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Addressee::class;

        parent::__construct($data, $logger);
    }
}