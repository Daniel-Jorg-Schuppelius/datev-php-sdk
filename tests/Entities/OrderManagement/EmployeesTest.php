<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\Employees\{Employee, Employees};
use Tests\Contracts\EntityTest;

class EmployeesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["personnel_number" => "001", "display_name" => "Employee 1"],
                ["personnel_number" => "002", "display_name" => "Employee 2"],
            ],
        ];
        $collection = new Employees($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Employee::class, $collection->getValues()[0]);
    }
}
