<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SubordersStateBillingTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\SuborderStateBilling\SubordersStateBilling;
use Datev\Entities\OrderManagement\SuborderStateBilling\SuborderStateBilling;

class SubordersStateBillingTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440000",
                    "order_id" => 1001,
                    "suborder_id" => 1,
                    "order_number" => 2024001,
                    "suborder_number" => 1
                ],
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440001",
                    "order_id" => 1002,
                    "suborder_id" => 2,
                    "order_number" => 2024002,
                    "suborder_number" => 1
                ]
            ]
        ];

        $suborders = new SubordersStateBilling($data);

        $this->assertCount(2, $suborders->getValues());
        $this->assertInstanceOf(SuborderStateBilling::class, $suborders->getValues()[0]);
    }
}
