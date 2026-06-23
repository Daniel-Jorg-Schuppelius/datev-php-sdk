<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OrderTypesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\OrderTypesEndpoint;
use Datev\Entities\OrderManagement\OrderTypes\{OrderType, OrderTypes};
use Tests\Contracts\EndpointTest;

class OrderTypesTest extends EndpointTest {
    protected ?OrderTypesEndpoint $endpoint;

    public function __construct($name = null) {
        parent::__construct($name);
        $this->endpoint = new OrderTypesEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function test_json_serialize() {
        $data = [
            'id' => 100,
            'ordertype' => 'FiBu',
            'ordertype_name' => 'Finanzbuchhaltung',
            'ordertype_group' => 50,
            'ordertype_group_name' => 'Buchhaltung',
        ];

        $orderType = OrderType::fromJson(json_encode($data));

        $this->assertInstanceOf(OrderType::class, $orderType);
        $this->assertEquals('FiBu', $orderType->getOrderType());
        $this->assertEquals('Finanzbuchhaltung', $orderType->getOrderTypeName());
        $this->assertEquals(50, $orderType->getOrderTypeGroup());
    }

    public function test_json_serialize_collection() {
        $data = [
            [
                'id' => 100,
                'ordertype' => 'FiBu',
                'ordertype_name' => 'Finanzbuchhaltung',
            ],
            [
                'id' => 101,
                'ordertype' => 'Lohn',
                'ordertype_name' => 'Lohnbuchhaltung',
            ],
        ];

        $orderTypes = OrderTypes::fromJson(json_encode($data));

        $this->assertInstanceOf(OrderTypes::class, $orderTypes);
        $this->assertCount(2, $orderTypes->getValues());
    }

    public function test_search_order_types() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $result = $this->endpoint->search();

        $this->assertInstanceOf(OrderTypes::class, $result);
    }
}
