<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\EmployeeCapacities\EmployeeCapacities;
use Datev\Entities\OrderManagement\EmployeeCapacities\EmployeeCapacity;

class EmployeeCapacitiesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "ec-1", "employee_id" => "emp-1", "total_hours_time_units" => 40.0],
                ["id" => "ec-2", "employee_id" => "emp-2", "total_hours_time_units" => 35.0]
            ]
        ];
        $collection = new EmployeeCapacities($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(EmployeeCapacity::class, $collection->getValues()[0]);
    }
}
