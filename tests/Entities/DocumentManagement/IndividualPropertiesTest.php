<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\IndividualProperties\IndividualProperties;
use Datev\Entities\DocumentManagement\IndividualProperties\IndividualProperty;

class IndividualPropertiesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "ip-1", "data_name" => "prop1", "display_name" => "Custom Property 1"],
                ["id" => "ip-2", "data_name" => "prop2", "display_name" => "Custom Property 2"]
            ]
        ];
        $collection = new IndividualProperties($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(IndividualProperty::class, $collection->getValues()[0]);
    }
}
