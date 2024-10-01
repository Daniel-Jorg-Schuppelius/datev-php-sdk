<?php

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
}
