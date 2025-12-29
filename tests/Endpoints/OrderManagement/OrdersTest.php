<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OrdersTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\OrdersEndpoint;
use Datev\Entities\OrderManagement\Orders\Order;
use Datev\Entities\OrderManagement\Orders\Orders;
use Tests\Contracts\EndpointTest;

class OrdersTest extends EndpointTest {
    protected ?OrdersEndpoint $endpoint;

    public function __construct($name = null) {
        parent::__construct($name);
        $this->endpoint = new OrdersEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testJsonSerialize() {
        $data = [
            'order_id' => 4711,
            'creation_year' => 2024,
            'order_number' => 20,
            'order_name' => 'Jahresabschluss 2024',
            'ordertype' => 'JA',
            'client_id' => 'd7e3c10f-8b5a-42d4-b790-e84c1762b8b9',
            'client_name' => 'Mustermann GmbH',
            'completion_status' => 'started',
            'billing_status' => 'open'
        ];

        $order = Order::fromJson(json_encode($data));

        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals(4711, $order->getID()->getValue());
        $this->assertEquals(2024, $order->getCreationYear());
        $this->assertEquals(20, $order->getOrderNumber());
        $this->assertEquals('Jahresabschluss 2024', $order->getOrderName());
        $this->assertEquals('started', $order->getCompletionStatus());
    }

    public function testJsonSerializeCollection() {
        $data = [
            [
                'order_id' => 4711,
                'creation_year' => 2024,
                'order_number' => 20,
                'order_name' => 'Jahresabschluss 2024'
            ],
            [
                'order_id' => 4712,
                'creation_year' => 2024,
                'order_number' => 21,
                'order_name' => 'Finanzbuchhaltung 01/2024'
            ]
        ];

        $orders = Orders::fromJson(json_encode($data));

        $this->assertInstanceOf(Orders::class, $orders);
        $this->assertCount(2, $orders->getValues());
    }

    public function testSearchOrders() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $result = $this->endpoint->search();

        $this->assertInstanceOf(Orders::class, $result);
    }
}
