<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AuthenticationScheme.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\IdentityAndAccessManagement\ServiceProvider;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class AuthenticationScheme extends NamedEntity {
    protected ?string $name;
    protected ?string $description;
    protected ?string $spec_uri;
    protected ?string $documentation_uri;
    protected ?string $type;
    protected ?bool $primary;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getDescription(): ?string {
        return $this->description ?? null;
    }

    public function getSpecUri(): ?string {
        return $this->spec_uri ?? null;
    }

    public function getDocumentationUri(): ?string {
        return $this->documentation_uri ?? null;
    }

    public function getType(): ?string {
        return $this->type ?? null;
    }

    public function isPrimary(): ?bool {
        return $this->primary ?? null;
    }
}
