<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MonthlyValueTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\MonthlyValues\MonthlyValue;
use Datev\Entities\OrderManagement\MonthlyValues\MonthlyValues;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class MonthlyValueTest extends TestCase {
    private ?LoggerInterface $logger = null;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateMonthlyValue(): void {
        $data = [
            "id" => "test-id",
            "order_id" => 2024001,
            "creation_year" => 2024,
            "order_number" => 1,
            "order_name" => "Jahresabschluss 2024",
            "ordertype" => "FIBU",
            "year" => 2024,
            "month" => 6,
            "total_hours" => 120.5,
            "total_costs" => 15000.00,
            "total_turnover" => 18000.00
        ];

        $monthlyValue = new MonthlyValue($data, $this->logger);

        $this->assertInstanceOf(MonthlyValue::class, $monthlyValue);
        $this->assertEquals(2024001, $monthlyValue->getOrderId());
        $this->assertEquals(2024, $monthlyValue->getCreationYear());
        $this->assertEquals(6, $monthlyValue->getMonth());
    }

    public function testCreateMonthlyValues(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "order_id" => 2024001,
                    "month" => 6
                ],
                [
                    "id" => "test-id-2",
                    "order_id" => 2024002,
                    "month" => 7
                ]
            ]
        ];

        $monthlyValues = new MonthlyValues($data, $this->logger);

        $this->assertInstanceOf(MonthlyValues::class, $monthlyValues);
        $this->assertCount(2, $monthlyValues);
    }
}
