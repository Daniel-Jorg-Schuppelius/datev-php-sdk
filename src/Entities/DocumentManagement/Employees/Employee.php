<?php

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
