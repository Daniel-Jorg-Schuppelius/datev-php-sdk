<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : State.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\States;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\DocumentManagement\Documents\Classes\DocumentClasses;
use Psr\Log\LoggerInterface;

class State extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?StateID $id;
    protected ?string $name;
    protected DocumentClasses $valid_document_classes;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?StateID {
        return $this->id ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getValidDocumentClasses(): DocumentClasses {
        return $this->valid_document_classes;
    }
}
