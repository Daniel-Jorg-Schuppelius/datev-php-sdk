<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : NumberStandardizedTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Datev\Entities\Common\NumberStandardized;
use Tests\Contracts\EntityTest;

class NumberStandardizedTest extends EntityTest {
    public function test_create_number_standardized(): void {
        $numberStandardized = new NumberStandardized("0049891234567890");

        $this->assertInstanceOf(NumberStandardized::class, $numberStandardized);
        $this->assertEquals("0049891234567890", $numberStandardized->getValue());
        $this->assertTrue($numberStandardized->isValid());
    }

    public function test_invalid_number_standardized(): void {
        $numberStandardized = new NumberStandardized("+49 89 12345678");

        $this->assertInstanceOf(NumberStandardized::class, $numberStandardized);
        $this->assertFalse($numberStandardized->isValid());
    }
}
