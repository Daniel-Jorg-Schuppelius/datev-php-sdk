<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\AccountPostings\AccountPostings;
use Datev\Entities\Accounting\AccountPostings\AccountPosting;

class AccountPostingsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "509_59_1_2_1", "account_number" => 43370000, "amount_debit" => 500.00, "posting_description" => "Test Buchung 1", "date" => "2024-02-29T00:00:00+01:00"],
                ["id" => "509_59_1_2_2", "account_number" => 44010000, "amount_debit" => 1000.00, "posting_description" => "Test Buchung 2", "date" => "2024-03-15T00:00:00+01:00"]
            ]
        ];
        $collection = new AccountPostings($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(AccountPosting::class, $collection->getValues()[0]);
    }
}
