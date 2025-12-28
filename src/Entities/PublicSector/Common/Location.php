<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Location.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\Common;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class Location extends NamedEntity {
    protected ?int $id;
    protected ?string $description;
    protected ?string $address_appendix;
    protected ?string $street;
    protected ?string $street_number;
    protected ?string $house_number;
    protected ?string $district;
    protected ?string $postal_code;
    protected ?string $zip_code;
    protected ?string $city;
    protected ?string $farmland;
    protected ?string $farmland_number;
    protected ?string $cadastral_number;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?int {
        return $this->id ?? null;
    }

    public function getDescription(): ?string {
        return $this->description ?? null;
    }

    public function getStreet(): ?string {
        return $this->street ?? null;
    }

    public function getStreetNumber(): ?string {
        return $this->street_number ?? null;
    }

    public function getPostalCode(): ?string {
        return $this->postal_code ?? null;
    }

    public function getCity(): ?string {
        return $this->city ?? null;
    }

    public function getHouseNumber(): ?string {
        return $this->house_number ?? null;
    }

    public function getZipCode(): ?string {
        return $this->zip_code ?? null;
    }
}
