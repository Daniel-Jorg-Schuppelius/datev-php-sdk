<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\AdvancePayments\{AdvancePayment, AdvancePayments};
use Tests\Contracts\EntityTest;

class AdvancePaymentsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["order_number" => "AZ-2024-001", "revenue_account" => 8400, "tax_key" => 7, "eu_member_state" => "DE"],
                ["order_number" => "AZ-2024-002", "revenue_account" => 8300, "tax_key" => 8, "eu_member_state" => "AT"],
            ],
        ];
        $collection = new AdvancePayments($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(AdvancePayment::class, $collection->getValues()[0]);
    }
}
