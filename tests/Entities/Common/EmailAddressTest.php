<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmailAddressTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Tests\Contracts\EntityTest;

use Datev\Entities\Common\EmailAddress;

class EmailAddressTest extends EntityTest {
    public function testCreateEmailAddress(): void {
        $emailAddress = new EmailAddress("max.mustermann@example.de");

        $this->assertInstanceOf(EmailAddress::class, $emailAddress);
        $this->assertEquals("max.mustermann@example.de", $emailAddress->getValue());
    }
}
