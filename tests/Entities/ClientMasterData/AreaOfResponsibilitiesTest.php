<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\AreaOfResponsibilities\{AreaOfResponsibilities, AreaOfResponsibility};
use Tests\Contracts\EntityTest;

class AreaOfResponsibilitiesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "aor-1", "name" => "Accounting", "description" => "Accounting responsibilities"],
                ["id" => "aor-2", "name" => "Payroll", "description" => "Payroll responsibilities"],
            ],
        ];
        $collection = new AreaOfResponsibilities($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(AreaOfResponsibility::class, $collection->getValues()[0]);
    }
}
