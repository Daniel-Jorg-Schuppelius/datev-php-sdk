<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeWithGroup.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\EmployeesWithGroup;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Entities\GUID;
use Psr\Log\LoggerInterface;

class EmployeeWithGroup extends NamedEntity {
    protected ?EmployeeWithGroupID $id;
    protected ?GUID $employee_id;
    protected ?int $employee_number;
    protected ?string $employee_name;
    protected ?int $employee_group_id;
    protected ?GUID $employee_group_id_guid;
    protected ?string $employee_group_short_name;
    protected ?string $employee_group_long_name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?EmployeeWithGroupID {
        return $this->id ?? null;
    }

    public function getEmployeeId(): ?GUID {
        return $this->employee_id ?? null;
    }

    public function getEmployeeNumber(): ?int {
        return $this->employee_number ?? null;
    }

    public function getEmployeeName(): ?string {
        return $this->employee_name ?? null;
    }

    public function getEmployeeGroupId(): ?int {
        return $this->employee_group_id ?? null;
    }

    public function getEmployeeGroupIdGuid(): ?GUID {
        return $this->employee_group_id_guid ?? null;
    }

    public function getEmployeeGroupShortName(): ?string {
        return $this->employee_group_short_name ?? null;
    }

    public function getEmployeeGroupLongName(): ?string {
        return $this->employee_group_long_name ?? null;
    }
}
