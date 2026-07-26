<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Cause.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\Causes;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class Cause extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?CauseID $id;
    protected ?string $name;
    /**
     * @var array<array-key, mixed>
     */
    protected ?array $departments;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?CauseID {
        return $this->id ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    /**
     * @return array<array-key, mixed>
     */
    public function getDepartments(): ?array {
        return $this->departments ?? null;
    }
}
