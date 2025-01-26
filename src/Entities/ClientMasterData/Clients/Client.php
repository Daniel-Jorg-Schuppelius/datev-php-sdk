<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Client.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Clients;

use DateTime;
use Datev\Entities\ClientMasterData\Establishments\ID\EstablishmentID;
use Datev\Entities\ClientMasterData\FunctionalAreas\ID\FunctionalAreaID;
use Datev\Entities\Common\Clients\Client as CommonClient;
use Datev\Entities\Common\LegalPersonID;
use Datev\Entities\Common\NaturalPersonID;
use Datev\Entities\Common\OrganizationID;
use Datev\Enums\PersonType;
use Datev\Enums\Status;
use Psr\Log\LoggerInterface;

class Client extends CommonClient {
    protected ?DateTime $client_since;
    protected ?DateTime $client_to;
    protected ?string $differing_name;
    protected ?LegalPersonID $legal_person_id;
    protected ?NaturalPersonID $natural_person_id;
    protected ?string $note;
    protected ?Status $status;
    protected ?DateTime $timestamp;
    protected PersonType $type;
    protected ?OrganizationID $organization_id;
    protected ?string $organization_name;
    protected ?int $organization_number;
    protected ?EstablishmentID $establishment_id;
    protected ?string $establishment_name;
    protected ?int $establishment_number;
    protected ?string $establishment_short_name;
    protected FunctionalAreaID $functional_area_id;
    protected ?string $functional_area_name;
    protected ?string $functional_area_short_name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getClientSince(): ?DateTime {
        return $this->client_since ?? null;
    }

    public function getClientTo(): ?DateTime {
        return $this->client_to ?? null;
    }

    public function getDifferingName(): ?string {
        return $this->differing_name ?? null;
    }

    public function getLegalPersonID(): ?LegalPersonID {
        return $this->legal_person_id ?? null;
    }

    public function getNaturalPersonID(): ?NaturalPersonID {
        return $this->natural_person_id ?? null;
    }

    public function getNote(): ?string {
        return $this->note ?? null;
    }

    public function getStatus(): ?Status {
        return $this->status ?? null;
    }

    public function getTimestamp(): ?DateTime {
        return $this->timestamp ?? null;
    }

    public function getType(): PersonType {
        return $this->type;
    }

    public function getOrganizationID(): ?OrganizationID {
        return $this->organization_id ?? null;
    }

    public function getOrganizationName(): ?string {
        return $this->organization_name ?? null;
    }

    public function getOrganizationNumber(): ?int {
        return $this->organization_number ?? null;
    }

    public function getEstablishmentID(): ?EstablishmentID {
        return $this->establishment_id ?? null;
    }

    public function getEstablishmentName(): ?string {
        return $this->establishment_name ?? null;
    }

    public function getEstablishmentNumber(): ?int {
        return $this->establishment_number ?? null;
    }

    public function getEstablishmentShortName(): ?string {
        return $this->establishment_short_name ?? null;
    }

    public function getFunctionalAreaID(): FunctionalAreaID {
        return $this->functional_area_id;
    }

    public function getFunctionalAreaName(): ?string {
        return $this->functional_area_name ?? null;
    }

    public function getFunctionalAreaShortName(): ?string {
        return $this->functional_area_short_name ?? null;
    }
}
