<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents\Domains;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class DocumentDomain extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?DocumentDomainID $id;
    protected ?string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): DocumentDomainID {
        return $this->id;
    }
}
