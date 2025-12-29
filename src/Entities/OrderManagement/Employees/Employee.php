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

namespace Datev\Entities\OrderManagement\Employees;

use APIToolkit\Entities\GUID;
use Datev\Entities\Common\Employees\Employee as BaseEmployee;
use Psr\Log\LoggerInterface;

class Employee extends BaseEmployee {
    protected ?string $personnel_number;
    protected ?string $first_name;
    protected ?string $last_name;
    protected ?string $display_name;
    protected ?GUID $costcenter_id;
    protected ?bool $isactive;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getPersonnelNumber(): ?string {
        return $this->personnel_number ?? null;
    }

    public function getFirstName(): ?string {
        return $this->first_name ?? null;
    }

    public function getLastName(): ?string {
        return $this->last_name ?? null;
    }

    public function getDisplayName(): ?string {
        return $this->display_name ?? null;
    }

    public function getCostcenterID(): ?GUID {
        return $this->costcenter_id ?? null;
    }

    public function isActive(): ?bool {
        return $this->isactive ?? null;
    }
}
