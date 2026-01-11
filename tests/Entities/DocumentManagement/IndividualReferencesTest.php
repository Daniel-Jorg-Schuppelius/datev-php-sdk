<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\IndividualReferences\IndividualReferences;
use Datev\Entities\DocumentManagement\IndividualReferences\IndividualReference;

class IndividualReferencesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "ir-1", "name" => "External Reference", "correspondence_partner_guid" => "123e4567-e89b-12d3-a456-426614174000"],
                ["id" => "ir-2", "name" => "Internal Reference", "correspondence_partner_guid" => "987fcdeb-51a2-34d5-b678-426614174001"]
            ]
        ];
        $collection = new IndividualReferences($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(IndividualReference::class, $collection->getValues()[0]);
    }
}
