<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents\Folders;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class DocumentFolder extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected DocumentFolderID $id;
    protected ?string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): DocumentFolderID {
        return $this->id;
    }
}
