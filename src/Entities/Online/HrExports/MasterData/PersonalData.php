<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PersonalData.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExports\MasterData;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Persönliche Daten des Arbeitnehmers.
 */
class PersonalData extends NamedEntity {
    protected string $social_security_number;

    protected int $personnel_number;

    protected string $first_name;

    protected string $surname;

    protected string $sex;

    protected string $nationality;

    protected string $date_of_birth;

    protected string $academic_title;

    protected string $name_prefix;

    protected string $title_of_nobility;

    protected string $company_personnel_number;

    protected EmployeeAddress $address;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getSocialSecurityNumber(): ?string {
        return $this->social_security_number ?? null;
    }

    public function getPersonnelNumber(): ?int {
        return $this->personnel_number ?? null;
    }

    public function getFirstName(): ?string {
        return $this->first_name ?? null;
    }

    public function getSurname(): ?string {
        return $this->surname ?? null;
    }

    public function getSex(): ?string {
        return $this->sex ?? null;
    }

    public function getNationality(): ?string {
        return $this->nationality ?? null;
    }

    public function getDateOfBirth(): ?string {
        return $this->date_of_birth ?? null;
    }

    public function getAcademicTitle(): ?string {
        return $this->academic_title ?? null;
    }

    public function getNamePrefix(): ?string {
        return $this->name_prefix ?? null;
    }

    public function getTitleOfNobility(): ?string {
        return $this->title_of_nobility ?? null;
    }

    public function getCompanyPersonnelNumber(): ?string {
        return $this->company_personnel_number ?? null;
    }

    public function getAddress(): ?EmployeeAddress {
        return $this->address ?? null;
    }
}
