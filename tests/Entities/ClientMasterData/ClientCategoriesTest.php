<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\ClientCategories\{ClientCategories, ClientCategory};
use Tests\Contracts\EntityTest;

class ClientCategoriesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "cc-1", "client_category_type_short_name" => "Category A", "client_name" => "Test Mandant 1"],
                ["id" => "cc-2", "client_category_type_short_name" => "Category B", "client_name" => "Test Mandant 2"],
            ],
        ];
        $collection = new ClientCategories($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ClientCategory::class, $collection->getValues()[0]);
    }
}
