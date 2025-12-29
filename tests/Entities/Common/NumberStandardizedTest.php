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
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class NumberStandardizedTest extends TestCase {
    public function testCreateNumberStandardized(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $numberStandardized = new NumberStandardized("0049891234567890", $logger);

        $this->assertInstanceOf(NumberStandardized::class, $numberStandardized);
        $this->assertEquals("0049891234567890", $numberStandardized->getValue());
        $this->assertTrue($numberStandardized->isValid());
    }

    public function testInvalidNumberStandardized(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $numberStandardized = new NumberStandardized("+49 89 12345678", $logger);

        $this->assertInstanceOf(NumberStandardized::class, $numberStandardized);
        $this->assertFalse($numberStandardized->isValid());
    }
}
