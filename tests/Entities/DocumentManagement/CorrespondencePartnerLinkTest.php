<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CorrespondencePartnerLinkTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\CorrespondencePartners\CorrespondencePartnerLink;
use Tests\Contracts\EntityTest;

class CorrespondencePartnerLinkTest extends EntityTest {
    public function test_create_from_string(): void {
        $url = "https://example.com/partner/12345";
        $link = new CorrespondencePartnerLink($url);

        $this->assertEquals($url, $link->getValue());
        $this->assertEquals('correspondence_partner_link', $link->getEntityName());
    }

    public function test_is_valid(): void {
        $link = new CorrespondencePartnerLink("https://example.com/partner");
        $this->assertTrue($link->isValid());
    }
}
