<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\ContactPersons;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class ContactPersons extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = ContactPerson::class;

        parent::__construct($data, $logger);
    }
}
