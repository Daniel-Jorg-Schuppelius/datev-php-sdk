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

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\CostCenterPropertyCharacteristics\CostCenterPropertyCharacteristic;
use Datev\Entities\Accounting\CostCenterPropertyCharacteristics\CostCenterPropertyCharacteristics;
use Datev\Entities\Accounting\CostCenterPropertyCharacteristics\CostCenterPropertyCharacteristicID;

class CostCenterPropertyCharacteristicTest extends EntityTest {
    public function testCreateCostCenterPropertyCharacteristic() {
        $data = [
            "id" => 1,
            "description" => "Characteristic Description"
        ];        $characteristic = new CostCenterPropertyCharacteristic($data);

        $this->assertInstanceOf(CostCenterPropertyCharacteristic::class, $characteristic);
        $this->assertInstanceOf(CostCenterPropertyCharacteristicID::class, $characteristic->getID());
    }

    public function testCreateCostCenterPropertyCharacteristics() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "description" => "Characteristic One"
                ],
                [
                    "id" => 2,
                    "description" => "Characteristic Two"
                ]
            ]
        ];        $characteristics = new CostCenterPropertyCharacteristics($data);

        $this->assertInstanceOf(CostCenterPropertyCharacteristics::class, $characteristics);
        $this->assertCount(2, $characteristics->getValues());
    }
}
