<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\Departments\Departments;
use Datev\Entities\Law\Departments\Department;

class DepartmentsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "dep-1", "name" => "Litigation", "number" => 1, "short_name" => "LIT"],
                ["id" => "dep-2", "name" => "Corporate", "number" => 2, "short_name" => "CORP"]
            ]
        ];
        $collection = new Departments($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Department::class, $collection->getValues()[0]);
    }
}
