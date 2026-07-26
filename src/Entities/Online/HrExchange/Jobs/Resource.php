<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Resource.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Jobs;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Beschreibung der anzufragenden Ressource beim Anlegen eines Lese-Jobs (POST /jobs).
 */
class Resource extends NamedEntity {
    protected string $path;

    protected string $resourceType;

    protected string $innermostReferenceDate;

    protected string $innerResourceName;

    protected string $innermostResourceType;

    protected string $resource_name;

    protected string $id;

    protected string $reference_date;

    protected Resource $sub_resource;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getPath(): ?string {
        return $this->path ?? null;
    }

    public function getResourceType(): ?string {
        return $this->resourceType ?? null;
    }

    public function getInnermostReferenceDate(): ?string {
        return $this->innermostReferenceDate ?? null;
    }

    public function getInnerResourceName(): ?string {
        return $this->innerResourceName ?? null;
    }

    public function getInnermostResourceType(): ?string {
        return $this->innermostResourceType ?? null;
    }

    public function getResourceName(): ?string {
        return $this->resource_name ?? null;
    }

    public function getId(): ?string {
        return $this->id ?? null;
    }

    public function getReferenceDate(): ?string {
        return $this->reference_date ?? null;
    }

    public function getSubResource(): ?Resource {
        return $this->sub_resource ?? null;
    }
}
