<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Taxations\TaxCards;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class TaxCards extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = TaxCard::class;

        parent::__construct($data, $logger);
    }
}