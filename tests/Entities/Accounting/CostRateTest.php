<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostRateTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\CostRates\CostRate;
use Datev\Entities\Accounting\CostRates\CostRates;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CostRateTest extends TestCase {
    private ?LoggerInterface $logger = null;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateCostRate(): void {
        $data = [
            "valid_from" => 202401,
            "valid_to" => 202412,
            "rate" => 125.50
        ];

        $costRate = new CostRate($data, $this->logger);

        $this->assertInstanceOf(CostRate::class, $costRate);
    }

    public function testCreateCostRates(): void {
        $data = [
            "content" => [
                [
                    "valid_from" => 202401,
                    "rate" => 125.50
                ],
                [
                    "valid_from" => 202407,
                    "rate" => 130.00
                ]
            ]
        ];

        $costRates = new CostRates($data, $this->logger);

        $this->assertInstanceOf(CostRates::class, $costRates);
        $this->assertCount(2, $costRates);
    }
}
