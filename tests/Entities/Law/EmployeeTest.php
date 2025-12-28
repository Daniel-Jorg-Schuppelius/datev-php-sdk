<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\Law\Employees\Employee;
use Datev\Entities\Law\Employees\Employees;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateEmployee() {
        $data = [
            "id" => "e1234567-8901-2345-6789-012345678901",
            "employee_number" => 1001,
            "display_name" => "Dr. Max Mustermann",
            "surname" => "Mustermann",
            "forename" => "Max",
            "email" => "max.mustermann@kanzlei.de",
            "active" => true
        ];

        $employee = new Employee($data, $this->logger);
        $this->assertInstanceOf(Employee::class, new Employee());
        $this->assertInstanceOf(Employee::class, $employee);
        $this->assertEquals("Dr. Max Mustermann", $employee->getDisplayName());
        $this->assertEquals("Mustermann", $employee->getSurname());
        $this->assertEquals(1001, $employee->getEmployeeNumber());
    }

    public function testCreateEmployees() {
        $data = [
            "content" => [
                [
                    "id" => "e1234567-8901-2345-6789-012345678901",
                    "display_name" => "Mitarbeiter 1"
                ],
                [
                    "id" => "e2234567-8901-2345-6789-012345678902",
                    "display_name" => "Mitarbeiter 2"
                ]
            ]
        ];

        $employees = new Employees($data, $this->logger);
        $this->assertInstanceOf(Employees::class, $employees);
        $this->assertCount(2, $employees->getValues());
    }
}
