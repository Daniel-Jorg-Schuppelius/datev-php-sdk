<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Employees\{Employee, Employees};
use Tests\Contracts\EntityTest;

class EmployeesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "emp-1", "name" => "Max Mustermann"],
                ["id" => "emp-2", "name" => "Erika Musterfrau"],
            ],
        ];
        $collection = new Employees($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Employee::class, $collection->getValues()[0]);
    }
}
