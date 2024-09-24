<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\CorrespondencePartners;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class CorrespondencePartners extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = CorrespondencePartner::class;

        parent::__construct($data, $logger);
    }
}
