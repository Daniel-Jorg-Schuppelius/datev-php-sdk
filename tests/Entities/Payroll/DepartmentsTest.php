<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DepartmentsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Departments\{Department, Departments};
use Tests\Contracts\EntityTest;

class DepartmentsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "id" => "1",
                    "name" => "IT-Abteilung",
                    "contact_person" => "Max Mustermann",
                ],
                [
                    "id" => "2",
                    "name" => "Personal",
                    "contact_person" => "Erika Musterfrau",
                ],
            ],
        ];

        $departments = new Departments($data);

        $this->assertCount(2, $departments->getValues());
        $this->assertInstanceOf(Department::class, $departments->getValues()[0]);
    }
}
