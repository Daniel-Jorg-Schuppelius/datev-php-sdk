<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SecurityZone.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\SecurityZones;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class SecurityZone extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?SecurityZoneID $id;
    protected ?string $short_name;
    protected ?string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?SecurityZoneID {
        return $this->id ?? null;
    }

    public function getShortName(): ?string {
        return $this->short_name ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }
}
