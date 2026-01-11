<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : NaturalPersonIDTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Tests\Contracts\EntityTest;

use Datev\Entities\Common\NaturalPersonID;

class NaturalPersonIDTest extends EntityTest {
    public function testCreateNaturalPersonID(): void {
        $naturalPersonID = new NaturalPersonID("550e8400-e29b-41d4-a716-446655440001");

        $this->assertInstanceOf(NaturalPersonID::class, $naturalPersonID);
        $this->assertEquals("550e8400-e29b-41d4-a716-446655440001", $naturalPersonID->getValue());
    }
}
