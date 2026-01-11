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

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\CostCenterProperties\CostCenterProperties;
use Datev\Entities\Accounting\CostCenterProperties\CostCenterProperty;
use Datev\Entities\Accounting\CostCenterProperties\CostCenterPropertyID;

class CostCenterPropertyTest extends EntityTest {
    public function testCreateCostCenterProperty() {
        $data = [
            "id" => 1,
            "description" => "Property Description"
        ];        $property = new CostCenterProperty($data);

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
        ];        $properties = new CostCenterProperties($data);

        $this->assertInstanceOf(CostCenterProperties::class, $properties);
        $this->assertCount(2, $properties->getValues());
    }
}
