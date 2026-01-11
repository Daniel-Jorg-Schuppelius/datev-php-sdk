<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ResourceType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\IdentityAndAccessManagement\Schemas;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Entities\IdentityAndAccessManagement\Users\ScimMeta;
use Psr\Log\LoggerInterface;

class ResourceType extends NamedEntity {
    protected ?string $id;
    protected ?string $name;
    protected ?string $description;
    protected ?string $endpoint;
    protected ?string $schema;
    protected ?SchemaExtensions $schema_extensions;
    protected ?ScimMeta $meta;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?string {
        return $this->id ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getDescription(): ?string {
        return $this->description ?? null;
    }

    public function getEndpoint(): ?string {
        return $this->endpoint ?? null;
    }

    public function getSchema(): ?string {
        return $this->schema ?? null;
    }

    public function getSchemaExtensions(): ?SchemaExtensions {
        return $this->schema_extensions ?? null;
    }

    public function getMeta(): ?ScimMeta {
        return $this->meta ?? null;
    }
}
