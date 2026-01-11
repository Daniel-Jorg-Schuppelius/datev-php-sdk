<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\CustomFields\CustomFields;
use Datev\Entities\Law\CustomFields\CustomField;

class CustomFieldsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "cf-1", "name" => "Custom Field 1", "datatype" => "string"],
                ["id" => "cf-2", "name" => "Custom Field 2", "datatype" => "int"]
            ]
        ];
        $collection = new CustomFields($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CustomField::class, $collection->getValues()[0]);
    }
}
