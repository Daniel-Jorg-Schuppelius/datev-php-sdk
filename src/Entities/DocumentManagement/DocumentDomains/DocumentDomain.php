<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\DocumentDomains;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class DocumentDomain extends NamedEntity implements IdentifiableInterface {
    protected ?DocumentDomainID $id;
    protected ?string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): DocumentDomainID {
        return $this->id;
    }
}
