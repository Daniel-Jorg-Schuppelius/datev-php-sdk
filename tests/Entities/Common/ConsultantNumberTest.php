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

use Datev\Entities\Common\ConsultantNumber;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class ConsultantNumberTest extends TestCase {
    public function testCreateConsultantNumber(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $consultantNumber = new ConsultantNumber("12345", $logger);

        $this->assertInstanceOf(ConsultantNumber::class, $consultantNumber);
        $this->assertEquals("12345", $consultantNumber->getValue());
    }
}
