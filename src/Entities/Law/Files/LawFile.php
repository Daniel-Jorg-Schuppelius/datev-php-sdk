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
    /**
     * @var array<array-key, mixed>
     */
    protected ?array $department;
    /**
     * @var array<array-key, mixed>
     */
    protected ?array $causes;
    /**
     * @var array<array-key, mixed>
     */
    protected ?array $partner;
    /**
     * @var array<array-key, mixed>
     */
    protected ?array $case_handlers;
    /**
     * @var array<array-key, mixed>
     */
    protected ?array $security_zone;
    /**
     * @var array<array-key, mixed>
     */
    protected ?array $establishment;
    /**
     * @var array<array-key, mixed>
     */
    protected ?array $economic_data;
    /**
     * @var array<array-key, mixed>
     */
    protected ?array $accounting_area;

    /**
     * @param array<string, mixed>|object|null $data
     */
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

    /**
     * @return array<array-key, mixed>
     */
    public function getDepartment(): ?array {
        return $this->department ?? null;
    }

    /**
     * @return array<array-key, mixed>
     */
    public function getCauses(): ?array {
        return $this->causes ?? null;
    }

    /**
     * @return array<array-key, mixed>
     */
    public function getPartner(): ?array {
        return $this->partner ?? null;
    }

    /**
     * @return array<array-key, mixed>
     */
    public function getCaseHandlers(): ?array {
        return $this->case_handlers ?? null;
    }

    /**
     * @return array<array-key, mixed>
     */
    public function getSecurityZone(): ?array {
        return $this->security_zone ?? null;
    }

    /**
     * @return array<array-key, mixed>
     */
    public function getEstablishment(): ?array {
        return $this->establishment ?? null;
    }

    /**
     * @return array<array-key, mixed>
     */
    public function getEconomicData(): ?array {
        return $this->economic_data ?? null;
    }

    /**
     * @return array<array-key, mixed>
     */
    public function getAccountingArea(): ?array {
        return $this->accounting_area ?? null;
    }
}
