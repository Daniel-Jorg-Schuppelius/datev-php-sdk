<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RegisterTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Registers\{Register, RegisterID, Registers};
use Tests\Contracts\EntityTest;

class RegisterTest extends EntityTest {
    public function test_create_register(): void {
        $data = [
            "id" => "reg-001",
            "name" => "Rechnungen 2024",
        ];

        $register = new Register($data);

        $this->assertInstanceOf(Register::class, $register);
        $this->assertInstanceOf(RegisterID::class, $register->getID());
        $this->assertEquals("reg-001", $register->getID()->getValue());
        $this->assertEquals("Rechnungen 2024", $register->getName());
    }

    public function test_create_registers(): void {
        $data = [
            "content" => [
                [
                    "id" => "reg-001",
                    "name" => "Rechnungen 2024",
                ],
                [
                    "id" => "reg-002",
                    "name" => "Belege 2024",
                ],
            ],
        ];

        $registers = new Registers($data);

        $this->assertInstanceOf(Registers::class, $registers);
        $this->assertCount(2, $registers);
        $this->assertInstanceOf(Register::class, $registers->getValues()[0]);
    }
}
