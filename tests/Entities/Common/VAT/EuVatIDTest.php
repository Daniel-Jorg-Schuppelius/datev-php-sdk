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
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class EuVatIDTest extends TestCase {
    public function testCreateEuVatID(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $euVatID = new EuVatID("DE123456789", $logger);

        $this->assertInstanceOf(EuVatID::class, $euVatID);
        $this->assertEquals("DE123456789", $euVatID->getValue());
    }
}
