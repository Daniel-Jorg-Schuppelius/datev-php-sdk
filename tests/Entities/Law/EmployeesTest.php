<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\Employees\Employees;
use Datev\Entities\Law\Employees\Employee;

class EmployeesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "emp-1", "display_name" => "Attorney 1", "employee_number" => 1001],
                ["id" => "emp-2", "display_name" => "Attorney 2", "employee_number" => 1002]
            ]
        ];
        $collection = new Employees($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Employee::class, $collection->getValues()[0]);
    }
}
