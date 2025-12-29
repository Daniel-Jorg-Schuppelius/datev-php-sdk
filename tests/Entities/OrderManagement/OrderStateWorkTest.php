<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OrderStateWorkTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\OrderStateWork\OrderStateWork;
use Datev\Entities\OrderManagement\OrderStateWork\OrderStateWorks;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class OrderStateWorkTest extends TestCase {
    private ?LoggerInterface $logger = null;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateOrderStateWork(): void {
        $data = [
            "id" => "test-id",
            "order_id" => 2024001,
            "creation_year" => 2024,
            "order_number" => 1,
            "creation_date" => "2024-01-15",
            "creation_employee_id" => "550e8400-e29b-41d4-a716-446655440000",
            "start_date" => "2024-01-20",
            "done_date" => "2024-03-15"
        ];

        $orderStateWork = new OrderStateWork($data, $this->logger);

        $this->assertInstanceOf(OrderStateWork::class, $orderStateWork);
        $this->assertEquals(2024001, $orderStateWork->getOrderId());
        $this->assertEquals(2024, $orderStateWork->getCreationYear());
    }

    public function testCreateOrderStateWorks(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "order_id" => 2024001
                ],
                [
                    "id" => "test-id-2",
                    "order_id" => 2024002
                ]
            ]
        ];

        $orderStateWorks = new OrderStateWorks($data, $this->logger);

        $this->assertInstanceOf(OrderStateWorks::class, $orderStateWorks);
        $this->assertCount(2, $orderStateWorks);
    }
}
