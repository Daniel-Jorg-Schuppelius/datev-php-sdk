<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Address.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Anschrift des Arbeitnehmers.
 */
class Address extends NamedEntity {
    protected string $address_affix;

    protected string $city;

    protected string $country;

    protected string $house_number;

    protected string $postal_code;

    protected string $street;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getAddressAffix(): ?string {
        return $this->address_affix ?? null;
    }

    public function getCity(): ?string {
        return $this->city ?? null;
    }

    public function getCountry(): ?string {
        return $this->country ?? null;
    }

    public function getHouseNumber(): ?string {
        return $this->house_number ?? null;
    }

    public function getPostalCode(): ?string {
        return $this->postal_code ?? null;
    }

    public function getStreet(): ?string {
        return $this->street ?? null;
    }
}
