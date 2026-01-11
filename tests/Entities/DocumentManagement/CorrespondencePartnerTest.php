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

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\CorrespondencePartners\CorrespondencePartner;
use Datev\Entities\DocumentManagement\CorrespondencePartners\CorrespondencePartners;

class CorrespondencePartnerTest extends EntityTest {
    public function testCreateCorrespondencePartner(): void {
        $data = [
            "domain" => "Mandant-12345"
        ];

        $correspondencePartner = new CorrespondencePartner($data);

        $this->assertInstanceOf(CorrespondencePartner::class, $correspondencePartner);
        $this->assertEquals("Mandant-12345", $correspondencePartner->getDomain());
    }

    public function testCreateCorrespondencePartners(): void {
        $data = [
            "content" => [
                [
                    "domain" => "Mandant-12345"
                ],
                [
                    "domain" => "Mandant-67890"
                ]
            ]
        ];

        $correspondencePartners = new CorrespondencePartners($data);

        $this->assertInstanceOf(CorrespondencePartners::class, $correspondencePartners);
        $this->assertCount(2, $correspondencePartners);
        $this->assertInstanceOf(CorrespondencePartner::class, $correspondencePartners->getValues()[0]);
    }
}
