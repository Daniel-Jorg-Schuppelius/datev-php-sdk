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

use Datev\Entities\Accounting\CostCenterPropertyCharacteristics\CostCenterPropertyCharacteristic;
use Datev\Entities\Accounting\CostCenterPropertyCharacteristics\CostCenterPropertyCharacteristics;
use Datev\Entities\Accounting\CostCenterPropertyCharacteristics\CostCenterPropertyCharacteristicID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class CostCenterPropertyCharacteristicTest extends TestCase {
    public function testCreateCostCenterPropertyCharacteristic() {
        $data = [
            "id" => 1,
            "description" => "Characteristic Description"
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $characteristic = new CostCenterPropertyCharacteristic($data, $logger);

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
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $characteristics = new CostCenterPropertyCharacteristics($data, $logger);

        $this->assertInstanceOf(CostCenterPropertyCharacteristics::class, $characteristics);
        $this->assertCount(2, $characteristics->getValues());
    }
}
