<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostItemTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\CostItems\CostItem;
use Datev\Entities\OrderManagement\CostItems\CostItems;

class CostItemTest extends EntityTest {
    
    public function testCreateCostItem(): void {
        $data = [
            "id" => "test-id",
            "order_id" => 2024001,
            "creation_year" => 2024,
            "order_number" => 1,
            "suborder_id" => 1,
            "suborder_number" => 100,
            "suborder_name" => "Hauptauftrag",
            "accounting_allowed" => true,
            "cost_position" => "1000",
            "cost_position_name" => "Allgemeine Kosten",
            "cost_type" => "direct",
            "fee_position" => "2000"
        ];

        $costItem = new CostItem($data);

        $this->assertInstanceOf(CostItem::class, $costItem);
        $this->assertEquals(2024001, $costItem->getOrderId());
        $this->assertEquals(2024, $costItem->getCreationYear());
        $this->assertEquals("1000", $costItem->getCostPosition());
    }

    public function testCreateCostItems(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "order_id" => 2024001,
                    "cost_position" => "1000"
                ],
                [
                    "id" => "test-id-2",
                    "order_id" => 2024002,
                    "cost_position" => "2000"
                ]
            ]
        ];

        $costItems = new CostItems($data);

        $this->assertInstanceOf(CostItems::class, $costItems);
        $this->assertCount(2, $costItems);
    }
}
