<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TaxAuthority.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\TaxAuthorities;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\ClientMasterData\CountryCodes\Code\CountryCode;
use Psr\Log\LoggerInterface;

class TaxAuthority extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?TaxAuthorityID $id;
    protected ?string $city;
    protected ?CountryCode $country_code;
    protected ?string $name;
    protected ?int $number;
    protected ?bool $standard;
    protected ?DateTime $timestamp;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): TaxAuthorityID {
        return $this->id;
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

    public function getNumber(): ?int {
        return $this->number ?? null;
    }

    public function isStandard(): bool {
        return $this->standard ?? false;
    }

    public function getTimestamp(): ?DateTime {
        return $this->timestamp ?? null;
    }
}
