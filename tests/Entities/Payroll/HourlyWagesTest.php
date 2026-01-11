<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\HourlyWages\HourlyWages;
use Datev\Entities\Payroll\HourlyWages\HourlyWage;

class HourlyWagesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "1", "personnel_number" => "00001", "amount" => 25.50],
                ["id" => "2", "personnel_number" => "00002", "amount" => 30.00]
            ]
        ];
        $collection = new HourlyWages($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(HourlyWage::class, $collection->getValues()[0]);
    }
}
