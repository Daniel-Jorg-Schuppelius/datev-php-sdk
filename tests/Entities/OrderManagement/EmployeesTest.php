<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\Employees\Employees;
use Datev\Entities\OrderManagement\Employees\Employee;

class EmployeesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["personnel_number" => "001", "display_name" => "Employee 1"],
                ["personnel_number" => "002", "display_name" => "Employee 2"]
            ]
        ];
        $collection = new Employees($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Employee::class, $collection->getValues()[0]);
    }
}
