<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VoluntaryInsuranceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll\Insurances;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\Insurances\Voluntary\VoluntaryInsurance;
use Datev\Entities\Payroll\Insurances\Voluntary\VoluntaryInsurances;
use Datev\Entities\Payroll\Insurances\Voluntary\VoluntaryInsuranceID;

class VoluntaryInsuranceTest extends EntityTest {
    public function testCreateVoluntaryInsurance(): void {
        $data = [
            "id" => "vi-001",
            "maximal_premium_for_voluntary_health_insurance" => "1000.00",
            "maximal_premium_for_voluntary_nursing_insurance" => "200.00"
        ];

        $voluntaryInsurance = new VoluntaryInsurance($data);

        $this->assertInstanceOf(VoluntaryInsurance::class, $voluntaryInsurance);
        $this->assertInstanceOf(VoluntaryInsuranceID::class, $voluntaryInsurance->getID());
        $this->assertEquals("vi-001", $voluntaryInsurance->getID()->getValue());
        $this->assertEquals("1000.00", $voluntaryInsurance->getMaximalPremiumForVoluntaryHealthInsurance());
        $this->assertEquals("200.00", $voluntaryInsurance->getMaximalPremiumForVoluntaryNursingInsurance());
    }

    public function testCreateVoluntaryInsurances(): void {
        $data = [
            "content" => [
                [
                    "id" => "vi-001",
                    "maximal_premium_for_voluntary_health_insurance" => "1000.00"
                ],
                [
                    "id" => "vi-002",
                    "maximal_premium_for_voluntary_health_insurance" => "1200.00"
                ]
            ]
        ];

        $voluntaryInsurances = new VoluntaryInsurances($data);

        $this->assertInstanceOf(VoluntaryInsurances::class, $voluntaryInsurances);
        $this->assertCount(2, $voluntaryInsurances);
        $this->assertInstanceOf(VoluntaryInsurance::class, $voluntaryInsurances->getValues()[0]);
    }
}
