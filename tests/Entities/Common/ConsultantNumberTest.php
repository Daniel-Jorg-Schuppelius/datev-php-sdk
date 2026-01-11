<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ConsultantNumberTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Tests\Contracts\EntityTest;

use Datev\Entities\Common\ConsultantNumber;

class ConsultantNumberTest extends EntityTest {
    public function testCreateConsultantNumber(): void {
        $consultantNumber = new ConsultantNumber("12345");

        $this->assertInstanceOf(ConsultantNumber::class, $consultantNumber);
        $this->assertEquals("12345", $consultantNumber->getValue());
    }
}
