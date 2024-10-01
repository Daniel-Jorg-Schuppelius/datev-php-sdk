<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Banks;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\Common\CountryCode;
use Psr\Log\LoggerInterface;

class Bank extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?BankID $id;
    protected ?string $bank_code;
    protected ?string $bic;
    protected ?string $city;
    protected ?CountryCode $country_code;
    protected ?string $name;
    protected ?string $surrogate_name;
    protected ?bool $standard;
    protected ?DateTime $timestamp;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): BankID {
        return $this->id;
    }
}
