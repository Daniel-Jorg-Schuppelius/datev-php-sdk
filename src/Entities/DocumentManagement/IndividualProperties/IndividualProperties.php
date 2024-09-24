<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\IndividualProperties;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class IndividualProperties extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = IndividualProperty::class;

        parent::__construct($data, $logger);
    }
}
