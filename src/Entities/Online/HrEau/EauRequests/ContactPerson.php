<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ContactPerson.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrEau\EauRequests;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Ansprechpartner des Arbeitgebers für die eAU-Anfrage.
 */
class ContactPerson extends NamedEntity {
    protected string $gender;

    protected string $name;

    protected string $telephone;

    protected string $fax;

    protected string $email;

    protected string $company_name;

    protected string $postal_code;

    protected string $city;

    protected string $street;

    protected string $house_number;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getGender(): ?string {
        return $this->gender ?? null;
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

    public function getCompanyName(): ?string {
        return $this->company_name ?? null;
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
