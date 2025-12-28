<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SchemaExtension.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\IdentityAndAccessManagement\Schemas;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class SchemaExtension extends NamedEntity {
    protected ?string $schema;
    protected ?bool $required;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getSchema(): ?string {
        return $this->schema ?? null;
    }

    public function isRequired(): ?bool {
        return $this->required ?? null;
    }
}
