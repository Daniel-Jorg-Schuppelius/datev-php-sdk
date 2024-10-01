<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\TaxOffices;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class TaxOffices extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = TaxOffice::class;

        parent::__construct($data, $logger);
    }
}
