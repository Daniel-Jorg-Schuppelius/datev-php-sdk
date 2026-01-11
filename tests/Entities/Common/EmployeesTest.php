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

namespace Tests\Entities\Common;

use Tests\Contracts\EntityTest;

use Datev\Entities\Common\Employees\Employees;
use Datev\Entities\Common\Employees\Employee;

class EmployeesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "emp-1"
                ],
                [
                    "id" => "emp-2"
                ]
            ]
        ];

        $employees = new Employees($data);

        $this->assertCount(2, $employees->getValues());
        $this->assertInstanceOf(Employee::class, $employees->getValues()[0]);
    }
}
