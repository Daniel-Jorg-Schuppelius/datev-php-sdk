<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OrderTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Orders\Order;
use Datev\Entities\DocumentManagement\Orders\Orders;
use Datev\Entities\DocumentManagement\Orders\OrderID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase {
    public function testCreateOrder(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "order-001",
            "name" => "Jahresabschluss",
            "assessment_year" => 2024,
            "creation_year" => 2024,
            "number" => 1
        ];

        $order = new Order($data, $logger);

        $this->assertInstanceOf(Order::class, $order);
        $this->assertInstanceOf(OrderID::class, $order->getID());
        $this->assertEquals("order-001", $order->getID()->getValue());
        $this->assertEquals("Jahresabschluss", $order->getName());
        $this->assertEquals(2024, $order->getAssessmentYear());
        $this->assertEquals(2024, $order->getCreationYear());
        $this->assertEquals(1, $order->getNumber());
    }

    public function testCreateOrders(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "id" => "order-001",
                    "name" => "Jahresabschluss",
                    "number" => 1
                ],
                [
                    "id" => "order-002",
                    "name" => "Steuererklärung",
                    "number" => 2
                ]
            ]
        ];

        $orders = new Orders($data, $logger);

        $this->assertInstanceOf(Orders::class, $orders);
        $this->assertCount(2, $orders);
        $this->assertInstanceOf(Order::class, $orders->getValues()[0]);
    }
}
