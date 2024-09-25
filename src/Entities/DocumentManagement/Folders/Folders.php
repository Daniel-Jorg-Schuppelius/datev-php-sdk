<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Folders;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class Folders extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = Folder::class;

        parent::__construct($data, $logger);
    }
}
