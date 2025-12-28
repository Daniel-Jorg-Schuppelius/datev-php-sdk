<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmploymentPeriodTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\EmploymentPeriods\EmploymentPeriod;
use Datev\Entities\Payroll\EmploymentPeriods\EmploymentPeriods;
use Datev\Entities\Payroll\EmploymentPeriods\EmploymentPeriodID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class EmploymentPeriodTest extends TestCase {
    public function testCreateEmploymentPeriod(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "emp-001",
            "personnel_number" => "12345",
            "date_of_commencement_of_employment" => "2020-01-01T00:00:00.000+00:00"
        ];

        $employmentPeriod = new EmploymentPeriod($data, $logger);

        $this->assertInstanceOf(EmploymentPeriod::class, $employmentPeriod);
        $this->assertInstanceOf(EmploymentPeriodID::class, $employmentPeriod->getID());
        $this->assertEquals("emp-001", $employmentPeriod->getID()->getValue());
        $this->assertEquals("12345", $employmentPeriod->getPersonnelNumber());
        $this->assertNotNull($employmentPeriod->getDateOfCommencementOfEmployment());
    }

    public function testCreateEmploymentPeriods(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "id" => "emp-001",
                    "personnel_number" => "12345"
                ],
                [
                    "id" => "emp-002",
                    "personnel_number" => "67890"
                ]
            ]
        ];

        $employmentPeriods = new EmploymentPeriods($data, $logger);

        $this->assertInstanceOf(EmploymentPeriods::class, $employmentPeriods);
        $this->assertCount(2, $employmentPeriods);
        $this->assertInstanceOf(EmploymentPeriod::class, $employmentPeriods->getValues()[0]);
    }
}
