<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\PropertyTemplates\{PropertyTemplate, PropertyTemplates};
use Tests\Contracts\EntityTest;

class PropertyTemplatesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "pt-1", "name" => "Template 1", "document_class" => ["id" => 1, "name" => "Invoice"]],
                ["id" => "pt-2", "name" => "Template 2", "document_class" => ["id" => 2, "name" => "Contract"]],
            ],
        ];
        $collection = new PropertyTemplates($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(PropertyTemplate::class, $collection->getValues()[0]);
    }
}
