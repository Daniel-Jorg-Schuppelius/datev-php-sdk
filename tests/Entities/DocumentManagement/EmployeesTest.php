<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\Employees\Employees;
use Datev\Entities\DocumentManagement\Employees\Employee;

class EmployeesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "emp-1", "name" => "Max Mustermann"],
                ["id" => "emp-2", "name" => "Erika Musterfrau"]
            ]
        ];
        $collection = new Employees($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Employee::class, $collection->getValues()[0]);
    }
}
