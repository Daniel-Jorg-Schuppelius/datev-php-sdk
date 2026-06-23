<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EuVatIDTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common\VAT;

use Datev\Entities\Common\VAT\EuVatID;
use Tests\Contracts\EntityTest;

class EuVatIDTest extends EntityTest {
    public function test_create_eu_vat_id(): void {
        $euVatID = new EuVatID("DE123456789");

        $this->assertInstanceOf(EuVatID::class, $euVatID);
        $this->assertEquals("DE123456789", $euVatID->getValue());
    }
}
