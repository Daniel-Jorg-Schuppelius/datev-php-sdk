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
use Datev\Entities\OrderManagement\Orders\{Order, Orders};
use Tests\Contracts\EndpointTest;

class OrdersTest extends EndpointTest {
    protected OrdersEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new OrdersEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'order_id' => 4711,
            'creation_year' => 2024,
            'order_number' => 20,
            'order_name' => 'Jahresabschluss 2024',
            'ordertype' => 'JA',
            'client_id' => 'd7e3c10f-8b5a-42d4-b790-e84c1762b8b9',
            'client_name' => 'Mustermann GmbH',
            'completion_status' => 'started',
            'billing_status' => 'open',
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);
        $order = Order::fromJson($json);

        $this->assertInstanceOf(Order::class, $order);
        $orderId = $order->getID();
        $this->assertNotNull($orderId);
        $this->assertEquals(4711, $orderId->getValue());
        $this->assertEquals(2024, $order->getCreationYear());
        $this->assertEquals(20, $order->getOrderNumber());
        $this->assertEquals('Jahresabschluss 2024', $order->getOrderName());
        $this->assertEquals('started', $order->getCompletionStatus());
    }

    public function test_json_serialize_collection(): void {
        $data = [
            [
                'order_id' => 4711,
                'creation_year' => 2024,
                'order_number' => 20,
                'order_name' => 'Jahresabschluss 2024',
            ],
            [
                'order_id' => 4712,
                'creation_year' => 2024,
                'order_number' => 21,
                'order_name' => 'Finanzbuchhaltung 01/2024',
            ],
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);
        $orders = Orders::fromJson($json);

        $this->assertInstanceOf(Orders::class, $orders);
        $this->assertCount(2, $orders->getValues());
    }

    public function test_search_orders(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $result = $this->endpoint->search();

        $this->assertInstanceOf(Orders::class, $result);
    }
}
