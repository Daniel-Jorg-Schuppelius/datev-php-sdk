<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\IndividualProperties\{IndividualProperties, IndividualProperty};
use Tests\Contracts\EntityTest;

class IndividualPropertiesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "ip-1", "data_name" => "prop1", "display_name" => "Custom Property 1"],
                ["id" => "ip-2", "data_name" => "prop2", "display_name" => "Custom Property 2"],
            ],
        ];
        $collection = new IndividualProperties($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(IndividualProperty::class, $collection->getValues()[0]);
    }
}
