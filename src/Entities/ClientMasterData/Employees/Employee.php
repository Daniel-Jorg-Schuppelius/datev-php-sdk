<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Employee.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

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

    public function getDisplayName(): ?string {
        return $this->display_name ?? null;
    }

    public function getEmail(): ?EmailAddress {
        return $this->email ?? null;
    }

    public function getEntryDate(): ?DateTime {
        return $this->entry_date ?? null;
    }

    public function getFax(): ?FaxNumber {
        return $this->fax ?? null;
    }

    public function getInitials(): ?string {
        return $this->initials ?? null;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getNaturalPersonID(): NaturalPersonID {
        return $this->natural_person_id;
    }

    public function getNote(): ?string {
        return $this->note ?? null;
    }

    public function getNumber(): ?int {
        return $this->number ?? null;
    }

    public function getPhoneExtension(): ?string {
        return $this->phone_extension ?? null;
    }

    public function getSeparationDate(): ?DateTime {
        return $this->separation_date ?? null;
    }

    public function getStatus(): ?Status {
        return $this->status ?? null;
    }

    public function getTimestamp(): ?DateTime {
        return $this->timestamp ?? null;
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
