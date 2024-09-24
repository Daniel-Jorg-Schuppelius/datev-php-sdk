<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Users;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Users extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = User::class;

        parent::__construct($data, $logger);
    }
}
