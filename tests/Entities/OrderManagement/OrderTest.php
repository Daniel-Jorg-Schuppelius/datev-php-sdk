<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OrderTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\OrderManagement\Orders\Order;
use Datev\Entities\OrderManagement\Orders\Orders;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateOrder() {
        $data = [
            "order_id" => "o1234567-8901-2345-6789-012345678901",
            "creation_year" => 2024,
            "order_number" => 12345,
            "order_name" => "Jahresabschluss 2024",
            "ordertype" => "JA",
            "ordertype_name" => "Jahresabschluss",
            "client_name" => "Mustermann GmbH",
            "assessment_year" => 2024,
            "fiscal_year" => 2024
        ];

        $order = new Order($data, $this->logger);
        $this->assertInstanceOf(Order::class, new Order());
        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals("Jahresabschluss 2024", $order->getOrderName());
        $this->assertEquals(2024, $order->getCreationYear());
    }

    public function testCreateOrders() {
        $data = [
            "content" => [
                [
                    "order_id" => "o1234567-8901-2345-6789-012345678901",
                    "order_name" => "Auftrag 1"
                ],
                [
                    "order_id" => "o2234567-8901-2345-6789-012345678902",
                    "order_name" => "Auftrag 2"
                ]
            ]
        ];

        $orders = new Orders($data, $this->logger);
        $this->assertInstanceOf(Orders::class, $orders);
        $this->assertCount(2, $orders->getValues());
    }
}
