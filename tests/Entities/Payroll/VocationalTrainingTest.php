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

use Datev\Entities\Payroll\VocationalTrainings\{VocationalTraining, VocationalTrainingID, VocationalTrainings};
use Tests\Contracts\EntityTest;

class VocationalTrainingTest extends EntityTest {
    public function test_create_vocational_training(): void {
        $data = [
            "id" => "vt-001",
            "personnel_number" => "12345",
            "amount" => 750.00,
        ];

        $vocationalTraining = new VocationalTraining($data);

        $this->assertInstanceOf(VocationalTraining::class, $vocationalTraining);
        $this->assertInstanceOf(VocationalTrainingID::class, $vocationalTraining->getID());
        $this->assertEquals("vt-001", $vocationalTraining->getID()->getValue());
        $this->assertEquals("12345", $vocationalTraining->getPersonnelNumber());
        $this->assertEquals(750.00, $vocationalTraining->getAmount());
    }

    public function test_create_vocational_trainings(): void {
        $data = [
            "content" => [
                [
                    "id" => "vt-001",
                    "personnel_number" => "12345",
                    "amount" => 750.00,
                ],
                [
                    "id" => "vt-002",
                    "personnel_number" => "67890",
                    "amount" => 800.00,
                ],
            ],
        ];

        $vocationalTrainings = new VocationalTrainings($data);

        $this->assertInstanceOf(VocationalTrainings::class, $vocationalTrainings);
        $this->assertCount(2, $vocationalTrainings);
        $this->assertInstanceOf(VocationalTraining::class, $vocationalTrainings->getValues()[0]);
    }
}
