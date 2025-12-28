<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostUnitTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\CostUnits\CostUnit;
use Datev\Entities\Payroll\CostUnits\CostUnits;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class CostUnitTest extends TestCase {
    public function testCreateCostUnit() {
        $data = [
            "id" => "A001",
            "name" => "Projekt Alpha"
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $costUnit = new CostUnit($data, $logger);

        $this->assertInstanceOf(CostUnit::class, $costUnit);
        $this->assertEquals("Projekt Alpha", $costUnit->getName());
    }

    public function testCreateCostUnits() {
        $data = [
            "content" => [
                [
                    "id" => "A001",
                    "name" => "Projekt Alpha"
                ],
                [
                    "id" => "B002",
                    "name" => "Projekt Beta"
                ]
            ]
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $costUnits = new CostUnits($data, $logger);

        $this->assertInstanceOf(CostUnits::class, $costUnits);
        $this->assertCount(2, $costUnits->getValues());
    }
}
