<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\BillingCategories\BillingCategories;
use Datev\Entities\Law\BillingCategories\BillingCategory;

class BillingCategoriesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["number" => 1, "name" => "Hourly"],
                ["number" => 2, "name" => "Fixed"]
            ]
        ];
        $collection = new BillingCategories($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(BillingCategory::class, $collection->getValues()[0]);
    }
}
