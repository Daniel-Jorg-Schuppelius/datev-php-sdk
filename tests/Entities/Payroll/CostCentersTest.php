<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCentersTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\CostCenters\{CostCenter, CostCenters};
use Tests\Contracts\EntityTest;

class CostCentersTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "id" => "1",
                    "name" => "Hauptkostenstelle",
                ],
                [
                    "id" => "2",
                    "name" => "Nebenkostenstelle",
                ],
            ],
        ];

        $costCenters = new CostCenters($data);

        $this->assertCount(2, $costCenters->getValues());
        $this->assertInstanceOf(CostCenter::class, $costCenters->getValues()[0]);
    }
}
