<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeQualificationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\EmployeesQualification\EmployeeQualification;
use Datev\Entities\OrderManagement\EmployeesQualification\EmployeesQualification;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class EmployeeQualificationTest extends TestCase {
    public function testCreateEmployeeQualification() {
        $data = [
            "id" => "a1b2c3d4-e5f6-7890-abcd-ef1234567890",
            "employee_id" => "b2c3d4e5-f6a7-8901-bcde-f12345678901",
            "employee_number" => 100,
            "qualification_id" => 1,
            "qualification_category" => 2,
            "qualification_abbreviation" => "WP",
            "qualification_short_name" => "Wirtschaftsprüfer",
            "qualification_long_name" => "Wirtschaftsprüfer (WP)",
            "qualification_active" => true
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $qualification = new EmployeeQualification($data, $logger);

        $this->assertInstanceOf(EmployeeQualification::class, $qualification);
        $this->assertEquals(100, $qualification->getEmployeeNumber());
        $this->assertEquals(1, $qualification->getQualificationId());
        $this->assertEquals("WP", $qualification->getQualificationAbbreviation());
        $this->assertEquals("Wirtschaftsprüfer", $qualification->getQualificationShortName());
    }

    public function testCreateEmployeesQualification() {
        $data = [
            "content" => [
                [
                    "id" => "a1b2c3d4-e5f6-7890-abcd-ef1234567890",
                    "employee_number" => 100,
                    "qualification_id" => 1,
                    "qualification_short_name" => "Steuerberater"
                ],
                [
                    "id" => "b2c3d4e5-f6a7-8901-bcde-f12345678901",
                    "employee_number" => 101,
                    "qualification_id" => 2,
                    "qualification_short_name" => "Wirtschaftsprüfer"
                ]
            ]
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $qualifications = new EmployeesQualification($data, $logger);

        $this->assertInstanceOf(EmployeesQualification::class, $qualifications);
        $this->assertCount(2, $qualifications->getValues());
    }
}
