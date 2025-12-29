<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeGroupTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Employees\Groups\EmployeeGroup;
use Datev\Entities\Payroll\Employees\Groups\EmployeeGroups;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class EmployeeGroupTest extends TestCase {
    public function testCreateEmployeeGroup(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "number" => "001",
            "name" => "Vollzeit-Mitarbeiter",
            "clearing_account_id" => 1234
        ];

        $employeeGroup = new EmployeeGroup($data, $logger);

        $this->assertInstanceOf(EmployeeGroup::class, $employeeGroup);
    }

    public function testCreateEmployeeGroups(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "number" => "001",
                    "name" => "Vollzeit"
                ],
                [
                    "number" => "002",
                    "name" => "Teilzeit"
                ]
            ]
        ];

        $employeeGroups = new EmployeeGroups($data, $logger);

        $this->assertInstanceOf(EmployeeGroups::class, $employeeGroups);
        $this->assertCount(2, $employeeGroups);
    }
}
