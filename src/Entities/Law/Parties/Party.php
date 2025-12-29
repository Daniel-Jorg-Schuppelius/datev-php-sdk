<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Party.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\Parties;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\Law\PartyRoles\PartyRole;
use Psr\Log\LoggerInterface;

class Party extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?PartyID $id;
    protected ?string $party_role_id;
    protected ?string $party_role_link;
    protected ?PartyRole $party_role;
    protected ?int $serial_number;
    protected ?string $surname;
    protected ?string $first_name;
    protected ?string $address_id;
    protected ?string $address_link;
    protected ?string $sign;
    protected ?string $subject;
    protected ?bool $entitled_to_deduct_input_vat;
    protected ?string $client_id;
    protected ?string $client_link;
    protected ?string $party_name;
    protected ?bool $party_name_modified;
    protected ?string $official_party_type;
    protected ?Parties $indirect_parties;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?PartyID {
        return $this->id ?? null;
    }

    public function getPartyRoleId(): ?string {
        return $this->party_role_id ?? null;
    }

    public function getPartyRoleLink(): ?string {
        return $this->party_role_link ?? null;
    }

    public function getPartyRole(): ?PartyRole {
        return $this->party_role ?? null;
    }

    public function getSerialNumber(): ?int {
        return $this->serial_number ?? null;
    }

    public function getSurname(): ?string {
        return $this->surname ?? null;
    }

    public function getFirstName(): ?string {
        return $this->first_name ?? null;
    }

    public function getAddressId(): ?string {
        return $this->address_id ?? null;
    }

    public function getAddressLink(): ?string {
        return $this->address_link ?? null;
    }

    public function getSign(): ?string {
        return $this->sign ?? null;
    }

    public function getSubject(): ?string {
        return $this->subject ?? null;
    }

    public function isEntitledToDeductInputVat(): ?bool {
        return $this->entitled_to_deduct_input_vat ?? null;
    }

    public function getClientId(): ?string {
        return $this->client_id ?? null;
    }

    public function getClientLink(): ?string {
        return $this->client_link ?? null;
    }

    public function getPartyName(): ?string {
        return $this->party_name ?? null;
    }

    public function isPartyNameModified(): ?bool {
        return $this->party_name_modified ?? null;
    }

    public function getOfficialPartyType(): ?string {
        return $this->official_party_type ?? null;
    }

    public function getIndirectParties(): ?Parties {
        return $this->indirect_parties ?? null;
    }
}
