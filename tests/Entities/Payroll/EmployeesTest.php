<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Employees\Employees;
use Datev\Entities\Payroll\Employees\Employee;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class EmployeesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "00001",
                    "surname" => "Mustermann",
                    "first_name" => "Max",
                    "company_personnel_number" => "00001",
                    "date_of_commencement_of_employment" => "2024-01-01"
                ],
                [
                    "id" => "00002",
                    "surname" => "Musterfrau",
                    "first_name" => "Erika",
                    "company_personnel_number" => "00002",
                    "date_of_commencement_of_employment" => "2024-02-01"
                ]
            ]
        ];

        $employees = new Employees($data, $this->logger);

        $this->assertCount(2, $employees->getValues());
        $this->assertInstanceOf(Employee::class, $employees->getValues()[0]);
    }
}
