<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RelationshipType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\RelationshipTypes;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class RelationshipType extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected RelationshipTypeID $id;
    protected ?string $abbreviation;
    protected ?string $name;
    protected ?bool $standard;
    protected ?int $type;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): RelationshipTypeID {
        return $this->id;
    }

    public function getAbbreviation(): ?string {
        return $this->abbreviation ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function isStandard(): ?bool {
        return $this->standard ?? null;
    }

    public function getType(): ?int {
        return $this->type ?? null;
    }
}
