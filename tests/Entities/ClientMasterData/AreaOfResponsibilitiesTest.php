<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\AreaOfResponsibilities\AreaOfResponsibilities;
use Datev\Entities\ClientMasterData\AreaOfResponsibilities\AreaOfResponsibility;

class AreaOfResponsibilitiesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "aor-1", "name" => "Accounting", "description" => "Accounting responsibilities"],
                ["id" => "aor-2", "name" => "Payroll", "description" => "Payroll responsibilities"]
            ]
        ];
        $collection = new AreaOfResponsibilities($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(AreaOfResponsibility::class, $collection->getValues()[0]);
    }
}
