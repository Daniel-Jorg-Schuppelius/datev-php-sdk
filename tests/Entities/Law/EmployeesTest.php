<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\Employees\{Employee, Employees};
use Tests\Contracts\EntityTest;

class EmployeesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "emp-1", "display_name" => "Attorney 1", "employee_number" => 1001],
                ["id" => "emp-2", "display_name" => "Attorney 2", "employee_number" => 1002],
            ],
        ];
        $collection = new Employees($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Employee::class, $collection->getValues()[0]);
    }
}
