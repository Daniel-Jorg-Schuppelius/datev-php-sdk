<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents\States;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\DocumentManagement\Documents\Classes\DocumentClasses;
use Psr\Log\LoggerInterface;

class DocumentState extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected DocumentStateID $id;
    protected ?string $name;
    protected ?DocumentClasses $valid_document_classes;


    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): DocumentStateID {
        return $this->id;
    }
}
