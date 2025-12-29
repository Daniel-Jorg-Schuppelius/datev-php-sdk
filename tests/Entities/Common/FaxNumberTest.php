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
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class FaxNumberTest extends TestCase {
    public function testCreateFaxNumber(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $faxNumber = new FaxNumber("+49 89 12345678", $logger);

        $this->assertInstanceOf(FaxNumber::class, $faxNumber);
        $this->assertEquals("+49 89 12345678", $faxNumber->getValue());
    }
}
