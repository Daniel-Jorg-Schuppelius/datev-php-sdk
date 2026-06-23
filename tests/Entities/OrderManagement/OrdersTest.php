<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OrdersTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\Orders\{Order, Orders};
use Tests\Contracts\EntityTest;

class OrdersTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "order_id" => 1,
                    "order_name" => "Jahresabschluss 2023",
                    "completion_status" => "active",
                ],
                [
                    "order_id" => 2,
                    "order_name" => "Lohnbuchhaltung 2024",
                    "completion_status" => "pending",
                ],
            ],
        ];

        $orders = new Orders($data);

        $this->assertCount(2, $orders->getValues());
        $this->assertInstanceOf(Order::class, $orders->getValues()[0]);
    }
}
