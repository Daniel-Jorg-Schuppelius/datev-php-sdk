<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents\Classes;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class DocumentClass extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected DocumentClassID $id;
    protected ?string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        if (is_int($data)) {
            $data = ["id" => $data];
        }

        parent::__construct($data, $logger);
    }

    public function getID(): DocumentClassID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }
}
