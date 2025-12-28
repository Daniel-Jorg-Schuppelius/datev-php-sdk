<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VacationEntitlementTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\VacationEntitlements\VacationEntitlement;
use Datev\Entities\Payroll\VacationEntitlements\VacationEntitlements;
use Datev\Entities\Payroll\VacationEntitlements\VacationEntitlementID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class VacationEntitlementTest extends TestCase {
    public function testCreateVacationEntitlement(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "vac-001",
            "basic_vacation_entitlement" => 30.0,
            "current_year_vacation_entitlement" => 25.0,
            "remaining_days_of_vacation_previous_year" => 5.0
        ];

        $vacationEntitlement = new VacationEntitlement($data, $logger);

        $this->assertInstanceOf(VacationEntitlement::class, $vacationEntitlement);
        $this->assertInstanceOf(VacationEntitlementID::class, $vacationEntitlement->getID());
        $this->assertEquals("vac-001", $vacationEntitlement->getID()->getValue());
        $this->assertEquals(30.0, $vacationEntitlement->getBasicVacationEntitlement());
        $this->assertEquals(25.0, $vacationEntitlement->getCurrentYearVacationEntitlement());
        $this->assertEquals(5.0, $vacationEntitlement->getRemainingDaysOfVacationPreviousYear());
    }

    public function testCreateVacationEntitlements(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "id" => "vac-001",
                    "basic_vacation_entitlement" => 30.0
                ],
                [
                    "id" => "vac-002",
                    "basic_vacation_entitlement" => 28.0
                ]
            ]
        ];

        $vacationEntitlements = new VacationEntitlements($data, $logger);

        $this->assertInstanceOf(VacationEntitlements::class, $vacationEntitlements);
        $this->assertCount(2, $vacationEntitlements);
        $this->assertInstanceOf(VacationEntitlement::class, $vacationEntitlements->getValues()[0]);
    }
}
