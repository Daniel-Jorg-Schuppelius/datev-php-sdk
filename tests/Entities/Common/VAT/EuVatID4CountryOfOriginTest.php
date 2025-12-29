<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EuVatID4CountryOfOriginTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common\VAT;

use Datev\Entities\Common\VAT\EuVatID4CountryOfOrigin;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class EuVatID4CountryOfOriginTest extends TestCase {
    public function testCreateEuVatID4CountryOfOrigin(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $euVatID4Country = new EuVatID4CountryOfOrigin("DE987654321", $logger);

        $this->assertInstanceOf(EuVatID4CountryOfOrigin::class, $euVatID4Country);
        $this->assertEquals("DE987654321", $euVatID4Country->getValue());
    }
}
