<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\BillingCategories\{BillingCategories, BillingCategory};
use Tests\Contracts\EntityTest;

class BillingCategoriesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["number" => 1, "name" => "Hourly"],
                ["number" => 2, "name" => "Fixed"],
            ],
        ];
        $collection = new BillingCategories($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(BillingCategory::class, $collection->getValues()[0]);
    }
}
