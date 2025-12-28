<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ResponsibilityTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Responsibilities\Responsibility;
use Datev\Entities\ClientMasterData\Responsibilities\Responsibilities;
use PHPUnit\Framework\TestCase;

class ResponsibilityTest extends TestCase {
    public function testCreateResponsibility() {
        $data = [
            "id" => 123,
            "area_of_responsibility_id" => "MV",
            "area_of_responsibility_name" => "Mandatsverantwortung",
            "employee_id" => "e23f9c3c-380c-494e-97c8-d12fff738189",
            "employee_display_name" => "Mustermann, Max",
            "employee_number" => 1001
        ];

        $responsibility = new Responsibility($data);
        $this->assertInstanceOf(Responsibility::class, $responsibility);
        $this->assertNotNull($responsibility->getID());
    }

    public function testCreateResponsibilities() {
        $data = [
            [
                "id" => 123,
                "area_of_responsibility_id" => "MV",
                "employee_number" => 1001
            ],
            [
                "id" => 124,
                "area_of_responsibility_id" => "AB",
                "employee_number" => 1002
            ]
        ];

        $responsibilities = new Responsibilities($data);
        $this->assertInstanceOf(Responsibilities::class, $responsibilities);
        $this->assertCount(2, $responsibilities);
    }
}
