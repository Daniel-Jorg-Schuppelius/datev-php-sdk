<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\VocationalTrainings\VocationalTrainings;
use Datev\Entities\Payroll\VocationalTrainings\VocationalTraining;

class VocationalTrainingsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "1", "personnel_number" => "00001", "amount" => 1000.00],
                ["id" => "2", "personnel_number" => "00002", "amount" => 1500.00]
            ]
        ];
        $collection = new VocationalTrainings($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(VocationalTraining::class, $collection->getValues()[0]);
    }
}
