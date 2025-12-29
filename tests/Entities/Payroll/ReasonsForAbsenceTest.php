<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ReasonsForAbsenceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\ReasonsForAbsence\ReasonsForAbsence;
use Datev\Entities\Payroll\ReasonsForAbsence\ReasonForAbsence;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ReasonsForAbsenceTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => 1, "name" => "Urlaub"],
                ["id" => 2, "name" => "Krankheit"]
            ]
        ];

        $reasons = new ReasonsForAbsence($data, $this->logger);

        $this->assertCount(2, $reasons->getValues());
        $this->assertInstanceOf(ReasonForAbsence::class, $reasons->getValues()[0]);
    }
}
