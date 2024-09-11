<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\DocumentClass;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class DocumentClass extends NamedEntity implements IdentifiableInterface {
    protected DocumentClassID $id;
    protected ?string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): DocumentClassID {
        return $this->id;
    }
}
