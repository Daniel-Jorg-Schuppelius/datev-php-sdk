<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FaxNumberTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Datev\Entities\Common\FaxNumber;
use Tests\Contracts\EntityTest;

class FaxNumberTest extends EntityTest {
    public function test_create_fax_number(): void {
        $faxNumber = new FaxNumber("+49 89 12345678");

        $this->assertInstanceOf(FaxNumber::class, $faxNumber);
        $this->assertEquals("+49 89 12345678", $faxNumber->getValue());
    }
}
