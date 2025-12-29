<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Relationship.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Relationships;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\ClientMasterData\Addressees\AddresseeID;
use Datev\Entities\ClientMasterData\RelationshipTypes\RelationshipTypeID;
use Datev\Enums\PersonType;
use Psr\Log\LoggerInterface;

class Relationship extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected RelationshipID $id;
    protected ?string $abbreviation;
    protected ?string $name;
    protected ?bool $standard;
    protected ?RelationshipTypeID $type_id;
    protected ?AddresseeID $has_addressee_id;
    protected ?string $has_addressee_display_name;
    protected ?PersonType $has_addressee_type;
    protected ?AddresseeID $is_addressee_id;
    protected ?string $is_addressee_display_name;
    protected ?PersonType $is_addressee_type;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): RelationshipID {
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

    public function getTypeID(): ?RelationshipTypeID {
        return $this->type_id ?? null;
    }

    public function getHasAddresseeID(): ?AddresseeID {
        return $this->has_addressee_id ?? null;
    }

    public function getHasAddresseeDisplayName(): ?string {
        return $this->has_addressee_display_name ?? null;
    }

    public function getHasAddresseeType(): ?PersonType {
        return $this->has_addressee_type ?? null;
    }

    public function getIsAddresseeID(): ?AddresseeID {
        return $this->is_addressee_id ?? null;
    }

    public function getIsAddresseeDisplayName(): ?string {
        return $this->is_addressee_display_name ?? null;
    }

    public function getIsAddresseeType(): ?PersonType {
        return $this->is_addressee_type ?? null;
    }
}
