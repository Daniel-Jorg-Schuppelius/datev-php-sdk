<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ScimSchemaAttribute.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\IdentityAndAccessManagement\Schemas;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class ScimSchemaAttribute extends NamedEntity {
    protected ?string $name;
    protected ?string $type;
    protected ?bool $multi_valued;
    protected ?string $description;
    protected ?bool $required;
    protected ?string $canonical_values;
    protected ?bool $case_exact;
    protected ?string $mutability;
    protected ?string $returned;
    protected ?string $uniqueness;
    protected ?array $reference_types;
    protected ?array $sub_attributes;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getType(): ?string {
        return $this->type ?? null;
    }

    public function isMultiValued(): ?bool {
        return $this->multi_valued ?? null;
    }

    public function getDescription(): ?string {
        return $this->description ?? null;
    }

    public function isRequired(): ?bool {
        return $this->required ?? null;
    }

    public function getCanonicalValues(): ?string {
        return $this->canonical_values ?? null;
    }

    public function isCaseExact(): ?bool {
        return $this->case_exact ?? null;
    }

    public function getMutability(): ?string {
        return $this->mutability ?? null;
    }

    public function getReturned(): ?string {
        return $this->returned ?? null;
    }

    public function getUniqueness(): ?string {
        return $this->uniqueness ?? null;
    }

    public function getReferenceTypes(): ?array {
        return $this->reference_types ?? null;
    }

    public function getSubAttributes(): ?array {
        return $this->sub_attributes ?? null;
    }
}
