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

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Employees\{Employee, Employees};
use Tests\Contracts\EntityTest;

class EmployeesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "id" => "emp-md-1",
                    "name" => "Mitarbeiter 1",
                    "number" => 1001,
                ],
                [
                    "id" => "emp-md-2",
                    "name" => "Mitarbeiter 2",
                    "number" => 1002,
                ],
            ],
        ];

        $employees = new Employees($data);

        $this->assertCount(2, $employees->getValues());
        $this->assertInstanceOf(Employee::class, $employees->getValues()[0]);
    }
}
