<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Data\Individual;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class IndividualData extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = IndividualDatum::class;

        parent::__construct($data, $logger);
    }

    public function toJson(int $flags = 0): string {
        return Parent::toJson($flags);
    }
}