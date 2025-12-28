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

use Datev\Entities\Payroll\ReasonsForAbsence\ReasonForAbsence;
use Datev\Entities\Payroll\ReasonsForAbsence\ReasonsForAbsence;
use Datev\Entities\Payroll\ReasonsForAbsence\ReasonForAbsenceID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class ReasonForAbsenceTest extends TestCase {
    public function testCreateReasonForAbsence(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "rfa-001",
            "name" => "Krankheit"
        ];

        $reasonForAbsence = new ReasonForAbsence($data, $logger);

        $this->assertInstanceOf(ReasonForAbsence::class, $reasonForAbsence);
        $this->assertInstanceOf(ReasonForAbsenceID::class, $reasonForAbsence->getID());
        $this->assertEquals("rfa-001", $reasonForAbsence->getID()->getValue());
        $this->assertEquals("Krankheit", $reasonForAbsence->getName());
    }

    public function testCreateReasonsForAbsence(): void {
        $logger = ConsoleLoggerFactory::getLogger();

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

        $reasonsForAbsence = new ReasonsForAbsence($data, $logger);

        $this->assertInstanceOf(ReasonsForAbsence::class, $reasonsForAbsence);
        $this->assertCount(2, $reasonsForAbsence);
        $this->assertInstanceOf(ReasonForAbsence::class, $reasonsForAbsence->getValues()[0]);
    }
}
