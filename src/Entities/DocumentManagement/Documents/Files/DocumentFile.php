<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents\Files;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class DocumentFile extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?DocumentFileID $id;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): DocumentFileID {
        return $this->id;
    }
}
