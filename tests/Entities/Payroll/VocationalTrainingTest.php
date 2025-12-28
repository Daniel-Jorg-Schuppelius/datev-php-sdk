<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VocationalTrainingTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\VocationalTrainings\VocationalTraining;
use Datev\Entities\Payroll\VocationalTrainings\VocationalTrainings;
use Datev\Entities\Payroll\VocationalTrainings\VocationalTrainingID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class VocationalTrainingTest extends TestCase {
    public function testCreateVocationalTraining(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "vt-001",
            "personnel_number" => "12345",
            "amount" => 750.00
        ];

        $vocationalTraining = new VocationalTraining($data, $logger);

        $this->assertInstanceOf(VocationalTraining::class, $vocationalTraining);
        $this->assertInstanceOf(VocationalTrainingID::class, $vocationalTraining->getID());
        $this->assertEquals("vt-001", $vocationalTraining->getID()->getValue());
        $this->assertEquals("12345", $vocationalTraining->getPersonnelNumber());
        $this->assertEquals(750.00, $vocationalTraining->getAmount());
    }

    public function testCreateVocationalTrainings(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "id" => "vt-001",
                    "personnel_number" => "12345",
                    "amount" => 750.00
                ],
                [
                    "id" => "vt-002",
                    "personnel_number" => "67890",
                    "amount" => 800.00
                ]
            ]
        ];

        $vocationalTrainings = new VocationalTrainings($data, $logger);

        $this->assertInstanceOf(VocationalTrainings::class, $vocationalTrainings);
        $this->assertCount(2, $vocationalTrainings);
        $this->assertInstanceOf(VocationalTraining::class, $vocationalTrainings->getValues()[0]);
    }
}
