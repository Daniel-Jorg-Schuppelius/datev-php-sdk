<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\InitialActivities\{InitialActivities, InitialActivity};
use Tests\Contracts\EntityTest;

class InitialActivitiesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "00001", "reference_date" => "2024-01-01", "activity_type" => "standard", "weekly_working_hours" => 40.0],
                ["id" => "00002", "reference_date" => "2024-02-01", "activity_type" => "minijob", "weekly_working_hours" => 10.0],
            ],
        ];
        $collection = new InitialActivities($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(InitialActivity::class, $collection->getValues()[0]);
    }
}
