<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Addresses;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class Address extends NamedEntity implements IdentifiableInterface {
    protected ?AddressID $id;
    protected ?string $street;
    protected ?string $house_number;
    protected ?string $city;
    protected ?string $postal_code;
    protected ?string $country;
    protected ?string $address_affix;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): AddressID {
        return $this->id;
    }
}