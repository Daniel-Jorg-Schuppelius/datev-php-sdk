<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : InternalCostServiceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\InternalCostServices\InternalCostService;
use Datev\Entities\Accounting\InternalCostServices\InternalCostServices;

class InternalCostServiceTest extends EntityTest {
    public function testCreateInternalCostService() {
        $data = [
            "amount" => 1500.00,
            "cost_center_from" => "10000",
            "cost_center_to" => "20000",
            "document_field1" => "Rechnung 2024-001",
            "document_field2" => "IT-Dienstleistung",
            "IBLZ_number" => 12345,
            "date" => "2024-06-15",
            "kost_quantity" => 10.5,
            "month" => "2024-06-01",
            "text" => "Interne Verrechnung IT"
        ];

        $costService = new InternalCostService($data);
        $this->assertInstanceOf(InternalCostService::class, new InternalCostService());
        $this->assertInstanceOf(InternalCostService::class, $costService);
        $this->assertEquals(1500.00, $costService->getAmount());
        $this->assertEquals("10000", $costService->getCostCenterFrom());
        $this->assertEquals("20000", $costService->getCostCenterTo());
        $this->assertEquals("Rechnung 2024-001", $costService->getDocumentField1());
    }

    public function testCreateInternalCostServices() {
        $data = [
            "content" => [
                [
                    "amount" => 1500.00,
                    "cost_center_from" => "10000",
                    "cost_center_to" => "20000"
                ],
                [
                    "amount" => 2500.00,
                    "cost_center_from" => "20000",
                    "cost_center_to" => "30000"
                ]
            ]
        ];

        $costServices = new InternalCostServices($data);
        $this->assertInstanceOf(InternalCostServices::class, $costServices);
        $this->assertCount(2, $costServices->getValues());
    }
}
