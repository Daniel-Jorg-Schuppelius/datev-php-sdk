<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DepartmentTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\Law\Departments\Department;
use Datev\Entities\Law\Departments\Departments;
use PHPUnit\Framework\TestCase;

class DepartmentTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateDepartment() {
        $data = [
            "id" => "d1234567-8901-2345-6789-012345678901",
            "number" => 1,
            "short_name" => "ZR",
            "name" => "Zivilrecht"
        ];

        $department = new Department($data, $this->logger);
        $this->assertInstanceOf(Department::class, new Department());
        $this->assertInstanceOf(Department::class, $department);
        $this->assertEquals("ZR", $department->getShortName());
        $this->assertEquals("Zivilrecht", $department->getName());
        $this->assertEquals(1, $department->getNumber());
    }

    public function testCreateDepartments() {
        $data = [
            "content" => [
                [
                    "id" => "d1234567-8901-2345-6789-012345678901",
                    "name" => "Zivilrecht"
                ],
                [
                    "id" => "d2234567-8901-2345-6789-012345678902",
                    "name" => "Strafrecht"
                ]
            ]
        ];

        $departments = new Departments($data, $this->logger);
        $this->assertInstanceOf(Departments::class, $departments);
        $this->assertCount(2, $departments->getValues());
    }
}
