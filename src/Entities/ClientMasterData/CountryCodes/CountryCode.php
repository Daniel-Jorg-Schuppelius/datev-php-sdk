<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\CountryCodes;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class CountryCode extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?CountryCodeID $id;
    protected ?string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): CountryCodeID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }
}
