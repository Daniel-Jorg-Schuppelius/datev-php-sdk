<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Employee.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Enums\Status;
use Psr\Log\LoggerInterface;

class Employee extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?EmployeeID $id;
    protected ?int $employee_number;
    protected ?string $display_name;
    protected ?string $surname;
    protected ?string $forename;
    protected ?string $email;
    protected ?string $phone;
    protected ?bool $active;
    /**
     * @var array<array-key, mixed>
     */
    protected ?array $functions;
    /**
     * @var array<array-key, mixed>
     */
    protected ?array $job_titles;
    protected ?Branch $branch;
    protected ?string $addressee_id;
    protected ?string $addressee_link;
    protected ?string $degree;
    protected ?string $title_of_nobility;
    protected ?string $name_prefix;
    protected ?string $firstname;
    protected ?string $correspondence_name;
    protected ?Status $activity_status;
    protected ?string $fax;
    protected ?string $assistant_id;
    protected ?string $assistant_link;
    protected ?string $initials;
    protected ?string $profit_center;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?EmployeeID {
        return $this->id ?? null;
    }

    public function getEmployeeNumber(): ?int {
        return $this->employee_number ?? null;
    }

    public function getDisplayName(): ?string {
        return $this->display_name ?? null;
    }

    public function getSurname(): ?string {
        return $this->surname ?? null;
    }

    public function getForename(): ?string {
        return $this->forename ?? null;
    }

    public function getEmail(): ?string {
        return $this->email ?? null;
    }

    public function getPhone(): ?string {
        return $this->phone ?? null;
    }

    public function isActive(): ?bool {
        return $this->active ?? null;
    }

    /**
     * @return array<array-key, mixed>
     */
    public function getFunctions(): ?array {
        return $this->functions ?? null;
    }

    /**
     * @return array<array-key, mixed>
     */
    public function getJobTitles(): ?array {
        return $this->job_titles ?? null;
    }

    public function getBranch(): ?Branch {
        return $this->branch ?? null;
    }

    public function getAddresseeId(): ?string {
        return $this->addressee_id ?? null;
    }

    public function getAddresseeLink(): ?string {
        return $this->addressee_link ?? null;
    }

    public function getDegree(): ?string {
        return $this->degree ?? null;
    }

    public function getTitleOfNobility(): ?string {
        return $this->title_of_nobility ?? null;
    }

    public function getNamePrefix(): ?string {
        return $this->name_prefix ?? null;
    }

    public function getFirstname(): ?string {
        return $this->firstname ?? null;
    }

    public function getCorrespondenceName(): ?string {
        return $this->correspondence_name ?? null;
    }

    public function getActivityStatus(): ?Status {
        return $this->activity_status ?? null;
    }

    public function getFax(): ?string {
        return $this->fax ?? null;
    }

    public function getAssistantId(): ?string {
        return $this->assistant_id ?? null;
    }

    public function getAssistantLink(): ?string {
        return $this->assistant_link ?? null;
    }

    public function getInitials(): ?string {
        return $this->initials ?? null;
    }

    public function getProfitCenter(): ?string {
        return $this->profit_center ?? null;
    }
}
