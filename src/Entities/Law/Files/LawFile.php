<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LawFile.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\Files;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class LawFile extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?FileID $id;
    protected ?string $file_number_short;
    protected ?string $file_number;
    protected ?string $file_name;
    protected ?string $short_name;
    protected ?string $category;
    protected ?string $project_number;
    protected ?string $short_reason;
    protected ?string $long_reason;
    protected ?array $department;
    protected ?array $causes;
    protected ?array $partner;
    protected ?array $case_handlers;
    protected ?array $security_zone;
    protected ?array $establishment;
    protected ?array $economic_data;
    protected ?array $accounting_area;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?FileID {
        return $this->id ?? null;
    }

    public function getFileNumberShort(): ?string {
        return $this->file_number_short ?? null;
    }

    public function getFileNumber(): ?string {
        return $this->file_number ?? null;
    }

    public function getFileName(): ?string {
        return $this->file_name ?? null;
    }

    public function getShortName(): ?string {
        return $this->short_name ?? null;
    }

    public function getCategory(): ?string {
        return $this->category ?? null;
    }

    public function getProjectNumber(): ?string {
        return $this->project_number ?? null;
    }

    public function getShortReason(): ?string {
        return $this->short_reason ?? null;
    }

    public function getLongReason(): ?string {
        return $this->long_reason ?? null;
    }

    public function getDepartment(): ?array {
        return $this->department ?? null;
    }

    public function getCauses(): ?array {
        return $this->causes ?? null;
    }

    public function getPartner(): ?array {
        return $this->partner ?? null;
    }

    public function getCaseHandlers(): ?array {
        return $this->case_handlers ?? null;
    }

    public function getSecurityZone(): ?array {
        return $this->security_zone ?? null;
    }

    public function getEstablishment(): ?array {
        return $this->establishment ?? null;
    }

    public function getEconomicData(): ?array {
        return $this->economic_data ?? null;
    }

    public function getAccountingArea(): ?array {
        return $this->accounting_area ?? null;
    }
}
