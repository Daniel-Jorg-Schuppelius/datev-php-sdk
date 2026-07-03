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

namespace Datev\Entities\Online\HrExchange\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Persönliche Daten des Arbeitnehmers.
 */
class PersonalData extends NamedEntity {
    protected string $nationality;

    protected string $sex;

    protected string $email;

    protected string $phone;

    protected string $academic_title;

    protected string $name_prefix;

    protected string $name_affix;

    protected string $birth_name;

    protected string $birth_name_prefix;

    protected string $birth_name_affix;

    protected string $country_of_birth;

    protected string $date_of_birth;

    protected string $place_of_birth;

    protected string $work_permit;

    protected string $residency_permit;

    protected string $certificate_of_study;

    protected string $social_security_number;

    protected string $european_social_security_number;

    protected string $initial_day_of_entrance;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getNationality(): ?string {
        return $this->nationality ?? null;
    }

    public function getSex(): ?string {
        return $this->sex ?? null;
    }

    public function getEmail(): ?string {
        return $this->email ?? null;
    }

    public function getPhone(): ?string {
        return $this->phone ?? null;
    }

    public function getAcademicTitle(): ?string {
        return $this->academic_title ?? null;
    }

    public function getNamePrefix(): ?string {
        return $this->name_prefix ?? null;
    }

    public function getNameAffix(): ?string {
        return $this->name_affix ?? null;
    }

    public function getBirthName(): ?string {
        return $this->birth_name ?? null;
    }

    public function getBirthNamePrefix(): ?string {
        return $this->birth_name_prefix ?? null;
    }

    public function getBirthNameAffix(): ?string {
        return $this->birth_name_affix ?? null;
    }

    public function getCountryOfBirth(): ?string {
        return $this->country_of_birth ?? null;
    }

    public function getDateOfBirth(): ?string {
        return $this->date_of_birth ?? null;
    }

    public function getPlaceOfBirth(): ?string {
        return $this->place_of_birth ?? null;
    }

    public function getWorkPermit(): ?string {
        return $this->work_permit ?? null;
    }

    public function getResidencyPermit(): ?string {
        return $this->residency_permit ?? null;
    }

    public function getCertificateOfStudy(): ?string {
        return $this->certificate_of_study ?? null;
    }

    public function getSocialSecurityNumber(): ?string {
        return $this->social_security_number ?? null;
    }

    public function getEuropeanSocialSecurityNumber(): ?string {
        return $this->european_social_security_number ?? null;
    }

    public function getInitialDayOfEntrance(): ?string {
        return $this->initial_day_of_entrance ?? null;
    }
}
