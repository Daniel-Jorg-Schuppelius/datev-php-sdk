<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ContactPersonHealthInsurance.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrEau\EauRequests;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Ansprechpartner der Krankenkasse in der eAU-Rückmeldung.
 */
class ContactPersonHealthInsurance extends NamedEntity {
    protected string $gender_contact_person;

    protected string $name;

    protected string $telephone;

    protected string $fax;

    protected string $email;

    protected string $name1_health_insurance;

    protected string $name2_health_insurance;

    protected string $name3_health_insurance;

    protected string $postal_code;

    protected string $city;

    protected string $street;

    protected string $house_number;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getGenderContactPerson(): ?string {
        return $this->gender_contact_person ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getTelephone(): ?string {
        return $this->telephone ?? null;
    }

    public function getFax(): ?string {
        return $this->fax ?? null;
    }

    public function getEmail(): ?string {
        return $this->email ?? null;
    }

    public function getName1HealthInsurance(): ?string {
        return $this->name1_health_insurance ?? null;
    }

    public function getName2HealthInsurance(): ?string {
        return $this->name2_health_insurance ?? null;
    }

    public function getName3HealthInsurance(): ?string {
        return $this->name3_health_insurance ?? null;
    }

    public function getPostalCode(): ?string {
        return $this->postal_code ?? null;
    }

    public function getCity(): ?string {
        return $this->city ?? null;
    }

    public function getStreet(): ?string {
        return $this->street ?? null;
    }

    public function getHouseNumber(): ?string {
        return $this->house_number ?? null;
    }
}
