<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCenterTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\CostCenters\CostCenter;
use Datev\Entities\Payroll\CostCenters\CostCenters;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class CostCenterTest extends TestCase {
    public function testCreateCostCenter() {
        $data = [
            "id" => "100",
            "name" => "Verwaltung"
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $costCenter = new CostCenter($data, $logger);

        $this->assertInstanceOf(CostCenter::class, $costCenter);
        $this->assertEquals("Verwaltung", $costCenter->getName());
    }

    public function testCreateCostCenters() {
        $data = [
            "content" => [
                [
                    "id" => "100",
                    "name" => "Verwaltung"
                ],
                [
                    "id" => "200",
                    "name" => "Produktion"
                ]
            ]
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $costCenters = new CostCenters($data, $logger);

        $this->assertInstanceOf(CostCenters::class, $costCenters);
        $this->assertCount(2, $costCenters->getValues());
    }
}
