<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Address.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Common\Addresses;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class Address extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?AddressID $id;
    protected ?string $street;
    protected ?string $city;
    protected ?string $postal_code;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): AddressID {
        return $this->id;
    }

    public function getStreet(): ?string {
        return $this->street ?? null;
    }

    public function getCity(): ?string {
        return $this->city ?? null;
    }

    public function getPostalCode(): ?string {
        return $this->postal_code ?? null;
    }

    public function getFullAddress(): string {
        return $this->street . ', ' . $this->postal_code . ' ' . $this->city;
    }
}
