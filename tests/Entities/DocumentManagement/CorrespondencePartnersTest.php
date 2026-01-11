<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\CorrespondencePartners\CorrespondencePartners;
use Datev\Entities\DocumentManagement\CorrespondencePartners\CorrespondencePartner;

class CorrespondencePartnersTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["domain" => "clients", "link" => "https://api.datev.de/clients/123"],
                ["domain" => "vendors", "link" => "https://api.datev.de/vendors/456"]
            ]
        ];
        $collection = new CorrespondencePartners($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CorrespondencePartner::class, $collection->getValues()[0]);
    }
}
