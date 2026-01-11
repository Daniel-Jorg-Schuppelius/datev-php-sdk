<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : StocktakingRecordTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\Stocktakings\StocktakingRecord;
use Datev\Entities\Accounting\Stocktakings\StocktakingRecords;

class StocktakingRecordTest extends EntityTest {
    public function testCreateStocktakingRecord() {
        $data = [
            "id" => "INV-2024-001",
            "asset_number" => 1001,
            "inventory_number" => "PC-2024-001",
            "accounting_reason" => 1,
            "inventory_name" => "Laptop Dell XPS 15",
            "acquisition_date" => "2024-01-15",
            "economic_lifetime" => 36,
            "kost1_cost_center_id" => "10000",
            "branch" => 1,
            "price" => 1599.00,
            "quantity" => 1.0,
            "stocktaking_date" => "2024-12-01",
            "unit" => "Stück",
            "serial_number" => "DELL-XPS-2024-ABC123",
            "location" => "Büro 101"
        ];

        $stocktakingRecord = new StocktakingRecord($data);
        $this->assertInstanceOf(StocktakingRecord::class, new StocktakingRecord());
        $this->assertInstanceOf(StocktakingRecord::class, $stocktakingRecord);
        $this->assertNotNull($stocktakingRecord->getID());
        $this->assertEquals(1001, $stocktakingRecord->getAssetNumber());
        $this->assertEquals("PC-2024-001", $stocktakingRecord->getInventoryNumber());
        $this->assertEquals("Laptop Dell XPS 15", $stocktakingRecord->getInventoryName());
        $this->assertEquals(1599.00, $stocktakingRecord->getPrice());
    }

    public function testCreateStocktakingRecords() {
        $data = [
            "content" => [
                [
                    "id" => "INV-2024-001",
                    "inventory_number" => "PC-2024-001",
                    "inventory_name" => "Laptop"
                ],
                [
                    "id" => "INV-2024-002",
                    "inventory_number" => "PC-2024-002",
                    "inventory_name" => "Monitor"
                ]
            ]
        ];

        $stocktakingRecords = new StocktakingRecords($data);
        $this->assertInstanceOf(StocktakingRecords::class, $stocktakingRecords);
        $this->assertCount(2, $stocktakingRecords->getValues());
    }
}
