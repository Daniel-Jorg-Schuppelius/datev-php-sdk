<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeesQualificationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\EmployeesQualification\{EmployeeQualification, EmployeesQualification};
use Tests\Contracts\EntityTest;

class EmployeesQualificationTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440000",
                    "employee_number" => 1001,
                    "qualification_abbreviation" => "PHP",
                    "qualification_short_name" => "PHP Developer",
                ],
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440001",
                    "employee_number" => 1002,
                    "qualification_abbreviation" => "JS",
                    "qualification_short_name" => "JavaScript Developer",
                ],
            ],
        ];

        $qualifications = new EmployeesQualification($data);

        $this->assertCount(2, $qualifications->getValues());
        $this->assertInstanceOf(EmployeeQualification::class, $qualifications->getValues()[0]);
    }
}
