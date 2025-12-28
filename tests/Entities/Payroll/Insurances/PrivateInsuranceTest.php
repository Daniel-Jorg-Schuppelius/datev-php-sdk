<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PrivateInsuranceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll\Insurances;

use Datev\Entities\Payroll\Insurances\Private\PrivateInsurance;
use Datev\Entities\Payroll\Insurances\Private\PrivateInsurances;
use Datev\Entities\Payroll\Insurances\Private\PrivateInsuranceID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class PrivateInsuranceTest extends TestCase {
    public function testCreatePrivateInsurance(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "pi-001",
            "is_private_health_insured" => true,
            "is_private_nursing_insured" => false,
            "monthly_premium_for_private_health_insurance" => 450.00,
            "monthly_premium_for_private_nursing_insurance" => 50.00,
            "monthly_contribution_to_basic_health_insurance" => 400.00
        ];

        $privateInsurance = new PrivateInsurance($data, $logger);

        $this->assertInstanceOf(PrivateInsurance::class, $privateInsurance);
        $this->assertInstanceOf(PrivateInsuranceID::class, $privateInsurance->getID());
        $this->assertEquals("pi-001", $privateInsurance->getID()->getValue());
        $this->assertTrue($privateInsurance->isPrivateHealthInsured());
        $this->assertFalse($privateInsurance->isPrivateNursingInsured());
        $this->assertEquals(450.00, $privateInsurance->getMonthlyPremiumForPrivateHealthInsurance());
    }

    public function testCreatePrivateInsurances(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "id" => "pi-001",
                    "is_private_health_insured" => true
                ],
                [
                    "id" => "pi-002",
                    "is_private_health_insured" => false
                ]
            ]
        ];

        $privateInsurances = new PrivateInsurances($data, $logger);

        $this->assertInstanceOf(PrivateInsurances::class, $privateInsurances);
        $this->assertCount(2, $privateInsurances);
        $this->assertInstanceOf(PrivateInsurance::class, $privateInsurances->getValues()[0]);
    }
}
