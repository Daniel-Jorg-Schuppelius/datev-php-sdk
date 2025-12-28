<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionAddressData.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\TransactionAddresses;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class TransactionAddressData extends NamedEntity {
    protected ?string $id;
    protected ?string $street;
    protected ?string $postal_code;
    protected ?string $city;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?string {
        return $this->id ?? null;
    }

    public function getStreet(): ?string {
        return $this->street ?? null;
    }

    public function getPostalCode(): ?string {
        return $this->postal_code ?? null;
    }

    public function getCity(): ?string {
        return $this->city ?? null;
    }
}
