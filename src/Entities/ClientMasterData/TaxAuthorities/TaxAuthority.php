<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\TaxAuthorities;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class TaxAuthority extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?TaxAuthorityID $id;
    protected ?string $city;
    protected ?string $country_code;
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
}
