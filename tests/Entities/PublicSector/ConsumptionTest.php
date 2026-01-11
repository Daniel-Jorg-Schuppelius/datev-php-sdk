<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ConsumptionTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\Consumptions\Consumption;
use Datev\Entities\PublicSector\Consumptions\Consumptions;

class ConsumptionTest extends EntityTest {
    public function testCreateConsumption() {
        $data = [
            "id" => "c1234567-8901-2345-6789-012345678901",
            "assessment_year" => 2024,
            "assessment_period" => "Q1",
            "description" => "Wasserverbrauch Q1 2024",
            "is_meter" => true,
            "extrapolation" => false,
            "prepayment" => false,
            "quantity" => 150.5,
            "quantity_to_be_billed" => 150.5,
            "first_date" => "2024-01-01T00:00:00.000+00:00",
            "last_date" => "2024-03-31T00:00:00.000+00:00"
        ];

        $consumption = new Consumption($data);
        $this->assertInstanceOf(Consumption::class, new Consumption());
        $this->assertInstanceOf(Consumption::class, $consumption);
        $this->assertEquals(2024, $consumption->getAssessmentYear());
        $this->assertEquals("Q1", $consumption->getAssessmentPeriod());
        $this->assertEquals("Wasserverbrauch Q1 2024", $consumption->getDescription());
        $this->assertEquals(150.5, $consumption->getQuantity());
    }

    public function testCreateConsumptions() {
        $data = [
            "content" => [
                [
                    "id" => "c1234567-8901-2345-6789-012345678901",
                    "assessment_year" => 2024,
                    "quantity" => 100.0
                ],
                [
                    "id" => "c2234567-8901-2345-6789-012345678902",
                    "assessment_year" => 2024,
                    "quantity" => 200.0
                ]
            ]
        ];

        $consumptions = new Consumptions($data);
        $this->assertInstanceOf(Consumptions::class, $consumptions);
        $this->assertCount(2, $consumptions->getValues());
    }
}
