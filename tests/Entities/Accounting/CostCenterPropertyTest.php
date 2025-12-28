<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCenterPropertyTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\CostCenterProperties\CostCenterProperties;
use Datev\Entities\Accounting\CostCenterProperties\CostCenterProperty;
use Datev\Entities\Accounting\CostCenterProperties\CostCenterPropertyID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class CostCenterPropertyTest extends TestCase {
    public function testCreateCostCenterProperty() {
        $data = [
            "id" => 1,
            "description" => "Property Description"
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $property = new CostCenterProperty($data, $logger);

        $this->assertInstanceOf(CostCenterProperty::class, $property);
        $this->assertInstanceOf(CostCenterPropertyID::class, $property->getID());
    }

    public function testCreateCostCenterProperties() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "description" => "Property One"
                ],
                [
                    "id" => 2,
                    "description" => "Property Two"
                ]
            ]
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $properties = new CostCenterProperties($data, $logger);

        $this->assertInstanceOf(CostCenterProperties::class, $properties);
        $this->assertCount(2, $properties->getValues());
    }
}
