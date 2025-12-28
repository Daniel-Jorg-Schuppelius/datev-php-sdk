<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SocialInsuranceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll\Insurances;

use Datev\Entities\Payroll\Insurances\Social\SocialInsurance;
use Datev\Entities\Payroll\Insurances\Social\SocialInsurances;
use Datev\Entities\Payroll\Insurances\Social\SocialInsuranceID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class SocialInsuranceTest extends TestCase {
    public function testCreateSocialInsurance(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "si-001",
            "contribution_class_health_insurance" => "general",
            "contribution_class_pension_insurance" => "full",
            "contribution_class_unemployment_insurance" => "full",
            "contribution_class_nursing_insurance" => "general",
            "allocation_method" => "standard",
            "legal_treatment" => "employee"
        ];

        $socialInsurance = new SocialInsurance($data, $logger);

        $this->assertInstanceOf(SocialInsurance::class, $socialInsurance);
        $this->assertInstanceOf(SocialInsuranceID::class, $socialInsurance->getID());
        $this->assertEquals("si-001", $socialInsurance->getID()->getValue());
        $this->assertEquals("general", $socialInsurance->getContributionClassHealthInsurance());
        $this->assertEquals("full", $socialInsurance->getContributionClassPensionInsurance());
    }

    public function testCreateSocialInsurances(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "id" => "si-001",
                    "contribution_class_health_insurance" => "general"
                ],
                [
                    "id" => "si-002",
                    "contribution_class_health_insurance" => "reduced"
                ]
            ]
        ];

        $socialInsurances = new SocialInsurances($data, $logger);

        $this->assertInstanceOf(SocialInsurances::class, $socialInsurances);
        $this->assertCount(2, $socialInsurances);
        $this->assertInstanceOf(SocialInsurance::class, $socialInsurances->getValues()[0]);
    }
}
