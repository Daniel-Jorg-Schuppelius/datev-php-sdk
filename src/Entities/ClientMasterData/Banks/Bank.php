<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Banks;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use APIToolkit\Entities\Bank\BIC;
use DateTime;
use Datev\Entities\ClientMasterData\CountryCodes\Code\CountryCode;
use Psr\Log\LoggerInterface;

class Bank extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?BankID $id;
    protected ?string $bank_code;
    protected ?BIC $bic;
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

    public function getBankCode(): ?string {
        return $this->bank_code ?? null;
    }

    public function getBIC(): ?BIC {
        return $this->bic ?? null;
    }

    public function getCity(): ?string {
        return $this->city ?? null;
    }

    public function getCountryCode(): ?CountryCode {
        return $this->country_code ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getSurrogateName(): ?string {
        return $this->surrogate_name ?? null;
    }

    public function isStandard(): bool {
        return $this->standard ?? false;
    }

    public function getTimestamp(): ?DateTime {
        return $this->timestamp ?? null;
    }
}
