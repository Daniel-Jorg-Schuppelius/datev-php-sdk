<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\AcknowledgementUsers;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class AcknowledgementUsers extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = AcknowledgementUser::class;

        parent::__construct($data, $logger);
    }
}
