<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\EmploymentPeriods\{EmploymentPeriod, EmploymentPeriods};
use Tests\Contracts\EntityTest;

class EmploymentPeriodsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "1", "personnel_number" => "00001", "date_of_commencement_of_employment" => "2020-01-01", "date_of_termination_of_employment" => "2023-12-31"],
                ["id" => "2", "personnel_number" => "00002", "date_of_commencement_of_employment" => "2024-01-01"],
            ],
        ];
        $collection = new EmploymentPeriods($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(EmploymentPeriod::class, $collection->getValues()[0]);
    }
}
