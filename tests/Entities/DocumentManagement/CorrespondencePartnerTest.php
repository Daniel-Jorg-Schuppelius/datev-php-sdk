<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CorrespondencePartnerTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\CorrespondencePartners\{CorrespondencePartner, CorrespondencePartners};
use Tests\Contracts\EntityTest;

class CorrespondencePartnerTest extends EntityTest {
    public function test_create_correspondence_partner(): void {
        $data = [
            "domain" => "Mandant-12345",
        ];

        $correspondencePartner = new CorrespondencePartner($data);

        $this->assertInstanceOf(CorrespondencePartner::class, $correspondencePartner);
        $this->assertEquals("Mandant-12345", $correspondencePartner->getDomain());
    }

    public function test_create_correspondence_partners(): void {
        $data = [
            "content" => [
                [
                    "domain" => "Mandant-12345",
                ],
                [
                    "domain" => "Mandant-67890",
                ],
            ],
        ];

        $correspondencePartners = new CorrespondencePartners($data);

        $this->assertInstanceOf(CorrespondencePartners::class, $correspondencePartners);
        $this->assertCount(2, $correspondencePartners);
        $this->assertInstanceOf(CorrespondencePartner::class, $correspondencePartners->getValues()[0]);
    }
}
