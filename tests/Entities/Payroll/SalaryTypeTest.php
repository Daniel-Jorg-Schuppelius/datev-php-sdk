<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SalaryTypeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\Salaries\SalaryTypes\SalaryType;
use Datev\Entities\Payroll\Salaries\SalaryTypes\SalaryTypes;
use Datev\Entities\Payroll\Salaries\SalaryTypes\SalaryTypeID;

class SalaryTypeTest extends EntityTest {
    public function testCreateSalaryType(): void {
        $data = [
            "id" => "st-001",
            "name" => "Grundgehalt",
            "core" => "base"
        ];

        $salaryType = new SalaryType($data);

        $this->assertInstanceOf(SalaryType::class, $salaryType);
        $this->assertInstanceOf(SalaryTypeID::class, $salaryType->getID());
        $this->assertEquals("st-001", $salaryType->getID()->getValue());
        $this->assertEquals("Grundgehalt", $salaryType->getName());
        $this->assertEquals("base", $salaryType->getCore());
    }

    public function testCreateSalaryTypes(): void {
        $data = [
            "content" => [
                [
                    "id" => "st-001",
                    "name" => "Grundgehalt"
                ],
                [
                    "id" => "st-002",
                    "name" => "Bonus"
                ]
            ]
        ];

        $salaryTypes = new SalaryTypes($data);

        $this->assertInstanceOf(SalaryTypes::class, $salaryTypes);
        $this->assertCount(2, $salaryTypes);
        $this->assertInstanceOf(SalaryType::class, $salaryTypes->getValues()[0]);
    }
}
