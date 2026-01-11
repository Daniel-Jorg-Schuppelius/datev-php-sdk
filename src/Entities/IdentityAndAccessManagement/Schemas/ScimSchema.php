<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ScimSchema.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\IdentityAndAccessManagement\Schemas;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Entities\IdentityAndAccessManagement\Users\ScimMeta;
use Psr\Log\LoggerInterface;

class ScimSchema extends NamedEntity {
    protected string $id;
    protected ?string $name;
    protected ?string $description;
    protected ?ScimSchemaAttributes $attributes;
    protected ?ScimMeta $meta;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): string {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getDescription(): ?string {
        return $this->description ?? null;
    }

    public function getAttributes(): ?ScimSchemaAttributes {
        return $this->attributes ?? null;
    }

    public function getMeta(): ?ScimMeta {
        return $this->meta ?? null;
    }
}
