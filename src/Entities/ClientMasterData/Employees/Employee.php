<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\Common\EmployeeID;
use Datev\Entities\Common\EstablishmentID;
use Datev\Entities\Common\FunctionalAreaID;
use Datev\Entities\Common\NaturalPersonID;
use Datev\Entities\Common\OrganizationID;
use Datev\Enums\Status;
use Psr\Log\LoggerInterface;

class Employee extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?EmployeeID $id;
    protected ?string $display_name;
    protected ?EmailAddress $email;
    protected ?DateTime $entry_date;
    protected ?FaxNumber $fax;
    protected ?string $initials;
    protected string $name;
    protected NaturalPersonID $natural_person_id;
    protected ?string $note;
    protected ?int $number;
    protected ?string $phone_extension;
    protected ?DateTime $separation_date;
    protected ?Status $status;
    protected ?DateTime $timestamp;
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

    public function getID(): EmployeeID {
        return $this->id;
    }
}
