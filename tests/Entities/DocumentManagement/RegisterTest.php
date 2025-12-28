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

use Datev\Entities\DocumentManagement\Registers\Register;
use Datev\Entities\DocumentManagement\Registers\Registers;
use Datev\Entities\DocumentManagement\Registers\RegisterID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class RegisterTest extends TestCase {
    public function testCreateRegister(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "reg-001",
            "name" => "Rechnungen 2024"
        ];

        $register = new Register($data, $logger);

        $this->assertInstanceOf(Register::class, $register);
        $this->assertInstanceOf(RegisterID::class, $register->getID());
        $this->assertEquals("reg-001", $register->getID()->getValue());
        $this->assertEquals("Rechnungen 2024", $register->getName());
    }

    public function testCreateRegisters(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "id" => "reg-001",
                    "name" => "Rechnungen 2024"
                ],
                [
                    "id" => "reg-002",
                    "name" => "Belege 2024"
                ]
            ]
        ];

        $registers = new Registers($data, $logger);

        $this->assertInstanceOf(Registers::class, $registers);
        $this->assertCount(2, $registers);
        $this->assertInstanceOf(Register::class, $registers->getValues()[0]);
    }
}
