<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Data\Personal;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class PersonalDatum extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected PersonalDataID $id;
    protected ?string $first_name;
    protected ?string $surname;
    protected ?string $academic_title;
    protected ?string $name_affix;
    protected ?string $name_prefix;
    protected ?string $birth_name;
    protected ?string $birth_name_affix;
    protected ?string $birth_name_prefix;
    protected ?DateTime $date_of_birth;
    protected ?string $place_of_birth;
    protected ?string $country_of_birth;
    protected ?string $nationality;
    protected ?string $marital_status;
    protected ?string $sex;
    protected ?string $social_security_number;
    protected ?DateTime $initial_day_of_entrance;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): PersonalDataID {
        return $this->id;
    }

    public function getFirstName(): ?string {
        return $this->first_name ?? null;
    }

    public function getSurname(): ?string {
        return $this->surname ?? null;
    }

    public function getAcademicTitle(): ?string {
        return $this->academic_title ?? null;
    }

    public function getNameAffix(): ?string {
        return $this->name_affix ?? null;
    }

    public function getNamePrefix(): ?string {
        return $this->name_prefix ?? null;
    }

    public function getBirthName(): ?string {
        return $this->birth_name ?? null;
    }

    public function getBirthNameAffix(): ?string {
        return $this->birth_name_affix ?? null;
    }

    public function getBirthNamePrefix(): ?string {
        return $this->birth_name_prefix ?? null;
    }

    public function getDateOfBirth(): ?DateTime {
        return $this->date_of_birth ?? null;
    }

    public function getPlaceOfBirth(): ?string {
        return $this->place_of_birth ?? null;
    }

    public function getCountryOfBirth(): ?string {
        return $this->country_of_birth ?? null;
    }

    public function getNationality(): ?string {
        return $this->nationality ?? null;
    }

    public function getMaritalStatus(): ?string {
        return $this->marital_status ?? null;
    }

    public function getSex(): ?string {
        return $this->sex ?? null;
    }

    public function getSocialSecurityNumber(): ?string {
        return $this->social_security_number ?? null;
    }

    public function getInitialDayOfEntrance(): ?DateTime {
        return $this->initial_day_of_entrance ?? null;
    }
}
