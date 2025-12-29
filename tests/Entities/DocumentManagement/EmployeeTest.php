<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Employees\Employee;
use Datev\Entities\DocumentManagement\Employees\Employees;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase {
    public function testCreateEmployee(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "name" => "Max Mustermann",
            "is_active" => true
        ];

        $employee = new Employee($data, $logger);

        $this->assertInstanceOf(Employee::class, $employee);
        $this->assertEquals("Max Mustermann", $employee->getName());
        $this->assertTrue($employee->isActive());
    }

    public function testCreateEmployees(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "name" => "Max Mustermann",
                    "is_active" => true
                ],
                [
                    "name" => "Erika Musterfrau",
                    "is_active" => false
                ]
            ]
        ];

        $employees = new Employees($data, $logger);

        $this->assertInstanceOf(Employees::class, $employees);
        $this->assertCount(2, $employees);
        $this->assertInstanceOf(Employee::class, $employees->getValues()[0]);
    }
}
