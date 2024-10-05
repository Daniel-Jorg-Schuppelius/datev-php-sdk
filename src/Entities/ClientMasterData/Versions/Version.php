<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Versions;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Entities\ProgramVersion;
use DateTime;
use Psr\Log\LoggerInterface;

class Version extends NamedEntity {
    protected ?VersionID $id;
    protected ?string $adress_country;
    protected ?int $client_number_maximum_number_of_digits;
    protected ?int $client_number_start;
    protected ?bool $client_categories_groups_supported;
    protected ?string $db_build;
    protected ?string $db_version;
    protected ?DateTime $db_version_date;
    protected ?ResourceRevision $resource_revision;
    protected ?ResourceVersion $resource_version;
    protected ?ProgramVersion $version;
    protected ?string $version_name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getAdressCountry(): ?string {
        return $this->adress_country ?? null;
    }

    public function getClientNumberMaximumNumberOfDigits(): ?int {
        return $this->client_number_maximum_number_of_digits ?? null;
    }

    public function getClientNumberStart(): ?int {
        return $this->client_number_start ?? null;
    }

    public function getDbBuild(): ?string {
        return $this->db_build ?? null;
    }

    public function getDbVersion(): ?string {
        return $this->db_version ?? null;
    }

    public function getDbVersionDate(): ?DateTime {
        return $this->db_version_date ?? null;
    }

    public function getResourceRevision(): ?ResourceRevision {
        return $this->resource_revision ?? null;
    }

    public function getResourceVersion(): ?ResourceVersion {
        return $this->resource_version ?? null;
    }

    public function getVersion(): ?ProgramVersion {
        return $this->version ?? null;
    }

    public function getVersionName(): ?string {
        return $this->version_name ?? null;
    }

    public function isClientCategoriesGroupsSupported(): bool {
        return $this->client_categories_groups_supported ?? false;
    }

    protected function getArray(bool $asStringValues = false, bool $dateAsStringValues = true, string $dateFormat = "d.m.Y"): array {
        return parent::getArray($asStringValues, $dateAsStringValues, $dateFormat);
    }
}
