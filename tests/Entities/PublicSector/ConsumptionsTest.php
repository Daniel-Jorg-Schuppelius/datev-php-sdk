<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ConsumptionsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\Consumptions\Consumptions;
use Datev\Entities\PublicSector\Consumptions\Consumption;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ConsumptionsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "cons-1",
                    "description" => "WATER",
                    "quantity" => 1000.0
                ],
                [
                    "id" => "cons-2",
                    "description" => "ELECTRICITY",
                    "quantity" => 500.0
                ]
            ]
        ];

        $consumptions = new Consumptions($data, $this->logger);

        $this->assertCount(2, $consumptions->getValues());
        $this->assertInstanceOf(Consumption::class, $consumptions->getValues()[0]);
    }
}
