<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Employee.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Employees;

use Datev\Entities\Common\Employees\Employee as BaseEmployee;

class Employee extends BaseEmployee {
    protected ?string $name;
    protected ?bool $is_active;

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function isActive(): bool {
        return $this->is_active ?? false;
    }
}
