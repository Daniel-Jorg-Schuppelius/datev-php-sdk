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

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\Departments\Departments;
use Datev\Entities\Payroll\Departments\Department;

class DepartmentsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "1",
                    "name" => "IT-Abteilung",
                    "contact_person" => "Max Mustermann"
                ],
                [
                    "id" => "2",
                    "name" => "Personal",
                    "contact_person" => "Erika Musterfrau"
                ]
            ]
        ];

        $departments = new Departments($data);

        $this->assertCount(2, $departments->getValues());
        $this->assertInstanceOf(Department::class, $departments->getValues()[0]);
    }
}
