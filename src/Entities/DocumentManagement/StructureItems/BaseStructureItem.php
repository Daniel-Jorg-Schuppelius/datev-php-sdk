<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\StructureItems;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\DocumentManagement\Documents\Files\DocumentFileID;
use Psr\Log\LoggerInterface;

class BaseStructureItem extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected StructureItemID $id;
    protected ?DateTime $creation_date;
    protected ?DateTime $last_modification_date;
    protected ?DocumentFileID $document_file_id;
    protected ?string $revision_comment;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): StructureItemID {
        return $this->id;
    }
}
