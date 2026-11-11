<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BaseStructureItem.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\StructureItems;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class BaseStructureItem extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected StructureItemID $id;
    protected ?DateTime $creation_date;
    protected ?DateTime $last_modification_date;
    protected ?StructureItemDocumentFileID $document_file_id;
    protected ?string $revision_comment;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): StructureItemID {
        return $this->id;
    }

    public function getCreationDate(): ?DateTime {
        return $this->creation_date ?? null;
    }

    public function getLastModificationDate(): ?DateTime {
        return $this->last_modification_date ?? null;
    }

    public function getDocumentFileID(): ?StructureItemDocumentFileID {
        return $this->document_file_id ?? null;
    }

    public function getRevisionComment(): ?string {
        return $this->revision_comment ?? null;
    }
}
