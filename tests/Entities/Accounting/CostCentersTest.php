<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCentersTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\CostCenters\CostCenters;
use Datev\Entities\Accounting\CostCenters\CostCenter;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CostCentersTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "cc-1",
                    "short_name" => "VW",
                    "long_name" => "Verwaltung"
                ],
                [
                    "id" => "cc-2",
                    "short_name" => "PR",
                    "long_name" => "Produktion"
                ]
            ]
        ];

        $costCenters = new CostCenters($data, $this->logger);

        $this->assertCount(2, $costCenters->getValues());
        $this->assertInstanceOf(CostCenter::class, $costCenters->getValues()[0]);
    }
}
