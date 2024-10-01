<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Clients;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\Common\EstablishmentID;
use Datev\Entities\Common\FunctionalAreaID;
use Datev\Entities\Common\LegalPersonID;
use Datev\Entities\Common\NaturalPersonID;
use Datev\Entities\Common\OrganizationID;
use Datev\Enums\PersonType;
use Datev\Enums\Status;
use Psr\Log\LoggerInterface;

class Client extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?ClientID $id;
    protected ?DateTime $client_since;
    protected ?DateTime $client_to;
    protected ?string $differing_name;
    protected ?LegalPersonID $legal_person_id;
    protected string $name;
    protected ?NaturalPersonID $natural_person_id;
    protected ?string $note;
    protected int $number;
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

    public function getID(): ClientID {
        return $this->id;
    }
}
