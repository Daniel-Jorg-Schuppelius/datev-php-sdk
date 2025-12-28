<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PartyRole.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\PartyRoles;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class PartyRole extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?PartyRoleID $id;
    protected ?int $number;
    protected ?string $type;
    protected ?string $short_name;
    protected ?string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?PartyRoleID {
        return $this->id ?? null;
    }

    public function getNumber(): ?int {
        return $this->number ?? null;
    }

    public function getType(): ?string {
        return $this->type ?? null;
    }

    public function getShortName(): ?string {
        return $this->short_name ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }
}
