<?php

declare(strict_types=1);

namespace Datev\Entities\Common\AdditionalMessages;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class AdditionalMessages extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = AdditionalMessage::class;

        parent::__construct($data, $logger);
    }
}
