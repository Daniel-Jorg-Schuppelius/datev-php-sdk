<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ScimMeta.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\IdentityAndAccessManagement\Users;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Psr\Log\LoggerInterface;

class ScimMeta extends NamedEntity {
    protected ?string $resource_type;
    protected ?string $location;
    protected ?DateTime $created;
    protected ?DateTime $last_modified;
    protected ?string $version;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getResourceType(): ?string {
        return $this->resource_type ?? null;
    }

    public function getLocation(): ?string {
        return $this->location ?? null;
    }

    public function getCreated(): ?DateTime {
        return $this->created ?? null;
    }

    public function getLastModified(): ?DateTime {
        return $this->last_modified ?? null;
    }

    public function getVersion(): ?string {
        return $this->version ?? null;
    }
}
