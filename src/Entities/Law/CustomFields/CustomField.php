<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CustomField.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\CustomFields;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class CustomField extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?CustomFieldID $id;
    protected ?string $relation;
    protected ?string $name;
    protected ?string $datatype;
    protected ?int $length;
    protected ?array $department;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?CustomFieldID {
        return $this->id ?? null;
    }

    public function getRelation(): ?string {
        return $this->relation ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getDatatype(): ?string {
        return $this->datatype ?? null;
    }

    public function getLength(): ?int {
        return $this->length ?? null;
    }

    public function getDepartment(): ?array {
        return $this->department ?? null;
    }
}
