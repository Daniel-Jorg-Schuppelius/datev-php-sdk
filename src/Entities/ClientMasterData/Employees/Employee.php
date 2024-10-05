<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Employees;

use DateTime;
use Datev\Entities\ClientMasterData\Establishments\ID\EstablishmentID;
use Datev\Entities\ClientMasterData\FunctionalAreas\ID\FunctionalAreaID;
use Datev\Entities\Common\EmailAddress;
use Datev\Entities\Common\Employees\Employee as BaseEmployee;
use Datev\Entities\Common\FaxNumber;
use Datev\Entities\Common\NaturalPersonID;
use Datev\Entities\Common\OrganizationID;
use Datev\Enums\Status;

class Employee extends BaseEmployee {
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
}
