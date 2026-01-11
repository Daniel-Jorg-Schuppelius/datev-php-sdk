<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ReasonForAbsenceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\ReasonsForAbsence\ReasonForAbsence;
use Datev\Entities\Payroll\ReasonsForAbsence\ReasonsForAbsence;
use Datev\Entities\Payroll\ReasonsForAbsence\ReasonForAbsenceID;

class ReasonForAbsenceTest extends EntityTest {
    public function testCreateReasonForAbsence(): void {
        $data = [
            "id" => "rfa-001",
            "name" => "Krankheit"
        ];

        $reasonForAbsence = new ReasonForAbsence($data);

        $this->assertInstanceOf(ReasonForAbsence::class, $reasonForAbsence);
        $this->assertInstanceOf(ReasonForAbsenceID::class, $reasonForAbsence->getID());
        $this->assertEquals("rfa-001", $reasonForAbsence->getID()->getValue());
        $this->assertEquals("Krankheit", $reasonForAbsence->getName());
    }

    public function testCreateReasonsForAbsence(): void {
        $data = [
            "content" => [
                [
                    "id" => "rfa-001",
                    "name" => "Krankheit"
                ],
                [
                    "id" => "rfa-002",
                    "name" => "Urlaub"
                ]
            ]
        ];

        $reasonsForAbsence = new ReasonsForAbsence($data);

        $this->assertInstanceOf(ReasonsForAbsence::class, $reasonsForAbsence);
        $this->assertCount(2, $reasonsForAbsence);
        $this->assertInstanceOf(ReasonForAbsence::class, $reasonsForAbsence->getValues()[0]);
    }
}
