<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VariousAddressIDTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Tests\Contracts\EntityTest;

use Datev\Entities\Common\VariousAddressID;

class VariousAddressIDTest extends EntityTest {
    public function testCreateVariousAddressID(): void {
        $variousAddressID = new VariousAddressID("addr-12345");

        $this->assertInstanceOf(VariousAddressID::class, $variousAddressID);
        $this->assertEquals("addr-12345", $variousAddressID->getValue());
    }
}
