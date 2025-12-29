<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCenterTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\Accounting\CostCenters\CostCenter;
use Datev\Entities\Accounting\CostCenters\CostCenters;
use PHPUnit\Framework\TestCase;

class CostCenterTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateCostCenter() {
        $data = [
            "id" => "10000",
            "long_name" => "Verwaltung",
            "short_name" => "VERW",
            "note" => "Verwaltungskostenstelle",
            "responsible" => "Müller",
            "city" => "Berlin",
            "street" => "Hauptstraße 1"
        ];

        $costCenter = new CostCenter($data, $this->logger);
        $this->assertInstanceOf(CostCenter::class, new CostCenter());
        $this->assertInstanceOf(CostCenter::class, $costCenter);
    }

    public function testCreateCostCenters() {
        $data = [
            "content" => [
                [
                    "id" => "10000",
                    "long_name" => "Verwaltung"
                ],
                [
                    "id" => "20000",
                    "long_name" => "Produktion"
                ]
            ]
        ];

        $costCenters = new CostCenters($data, $this->logger);
        $this->assertInstanceOf(CostCenters::class, $costCenters);
        $this->assertCount(2, $costCenters->getValues());
    }
}
