<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ChargeRateTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\ChargeRates\ChargeRate;
use Datev\Entities\OrderManagement\ChargeRates\ChargeRates;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ChargeRateTest extends TestCase {
    private ?LoggerInterface $logger = null;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateChargeRate(): void {
        $data = [
            "id" => "550e8400-e29b-41d4-a716-446655440000",
            "employee_id" => "660e8400-e29b-41d4-a716-446655440001",
            "valid_from" => "2024-01-01",
            "charge_rate_1" => 150.00,
            "charge_rate_2" => 175.00,
            "charge_rate_3" => 200.00
        ];

        $chargeRate = new ChargeRate($data, $this->logger);

        $this->assertInstanceOf(ChargeRate::class, $chargeRate);
        $this->assertNotNull($chargeRate->getID());
        $this->assertNotNull($chargeRate->getEmployeeID());
        $this->assertEquals(150.00, $chargeRate->getChargeRate1());
    }

    public function testCreateChargeRates(): void {
        $data = [
            "content" => [
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440000",
                    "employee_id" => "660e8400-e29b-41d4-a716-446655440001",
                    "charge_rate_1" => 150.00
                ],
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440002",
                    "employee_id" => "660e8400-e29b-41d4-a716-446655440003",
                    "charge_rate_1" => 175.00
                ]
            ]
        ];

        $chargeRates = new ChargeRates($data, $this->logger);

        $this->assertInstanceOf(ChargeRates::class, $chargeRates);
        $this->assertCount(2, $chargeRates);
    }
}
