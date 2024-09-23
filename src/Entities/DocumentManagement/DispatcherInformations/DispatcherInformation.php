<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\DispatcherInformations;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class DispatcherInformation extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?ExternalDocumentID $external_id;
    protected string $application;
    protected string $comment;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ExternalDocumentID {
        return $this->external_id;
    }
}
