<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeGroupAccountingTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Employees\Groups\Accountings\EmployeeGroupAccounting;
use Datev\Entities\Payroll\Employees\Groups\Accountings\EmployeeGroupAccountings;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class EmployeeGroupAccountingTest extends TestCase {
    public function testCreateEmployeeGroupAccounting(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "ega-001",
            "name" => "Buchhaltung Team A",
            "cost_center" => "1000"
        ];

        $employeeGroupAccounting = new EmployeeGroupAccounting($data, $logger);

        $this->assertInstanceOf(EmployeeGroupAccounting::class, $employeeGroupAccounting);
    }

    public function testCreateEmployeeGroupsAccounting(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "id" => "ega-001",
                    "name" => "Buchhaltung Team A"
                ],
                [
                    "id" => "ega-002",
                    "name" => "Buchhaltung Team B"
                ]
            ]
        ];

        $employeeGroupsAccounting = new EmployeeGroupAccountings($data, $logger);

        $this->assertInstanceOf(EmployeeGroupAccountings::class, $employeeGroupsAccounting);
        $this->assertCount(2, $employeeGroupsAccounting);
    }
}
