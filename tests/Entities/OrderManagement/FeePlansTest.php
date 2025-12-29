<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FeePlansTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\FeePlans\FeePlans;
use Datev\Entities\OrderManagement\FeePlans\FeePlan;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class FeePlansTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "fp-1",
                    "fee_plan_name" => "Standard Gebührenplan",
                    "fee_plan_number" => 1
                ],
                [
                    "id" => "fp-2",
                    "fee_plan_name" => "Premium Gebührenplan",
                    "fee_plan_number" => 2
                ]
            ]
        ];

        $feePlans = new FeePlans($data, $this->logger);

        $this->assertCount(2, $feePlans->getValues());
        $this->assertInstanceOf(FeePlan::class, $feePlans->getValues()[0]);
    }
}
