<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\CorrespondencePartners\{CorrespondencePartner, CorrespondencePartners};
use Tests\Contracts\EntityTest;

class CorrespondencePartnersTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["domain" => "clients", "link" => "https://api.datev.de/clients/123"],
                ["domain" => "vendors", "link" => "https://api.datev.de/vendors/456"],
            ],
        ];
        $collection = new CorrespondencePartners($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CorrespondencePartner::class, $collection->getValues()[0]);
    }
}
