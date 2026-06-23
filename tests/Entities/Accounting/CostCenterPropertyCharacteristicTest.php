<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCenterPropertyCharacteristicTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\CostCenterPropertyCharacteristics\{CostCenterPropertyCharacteristic, CostCenterPropertyCharacteristicID, CostCenterPropertyCharacteristics};
use Tests\Contracts\EntityTest;

class CostCenterPropertyCharacteristicTest extends EntityTest {
    public function test_create_cost_center_property_characteristic() {
        $data = [
            "id" => 1,
            "description" => "Characteristic Description",
        ];
        $characteristic = new CostCenterPropertyCharacteristic($data);

        $this->assertInstanceOf(CostCenterPropertyCharacteristic::class, $characteristic);
        $this->assertInstanceOf(CostCenterPropertyCharacteristicID::class, $characteristic->getID());
    }

    public function test_create_cost_center_property_characteristics() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "description" => "Characteristic One",
                ],
                [
                    "id" => 2,
                    "description" => "Characteristic Two",
                ],
            ],
        ];
        $characteristics = new CostCenterPropertyCharacteristics($data);

        $this->assertInstanceOf(CostCenterPropertyCharacteristics::class, $characteristics);
        $this->assertCount(2, $characteristics->getValues());
    }
}
