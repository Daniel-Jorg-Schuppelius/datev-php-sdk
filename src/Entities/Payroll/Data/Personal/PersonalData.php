<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Data\Personal;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class PersonalData extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = PersonalDatum::class;

        parent::__construct($data, $logger);
    }
}
