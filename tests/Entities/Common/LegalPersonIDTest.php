<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LegalPersonIDTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Datev\Entities\Common\LegalPersonID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class LegalPersonIDTest extends TestCase {
    public function testCreateLegalPersonID(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $legalPersonID = new LegalPersonID("550e8400-e29b-41d4-a716-446655440000", $logger);

        $this->assertInstanceOf(LegalPersonID::class, $legalPersonID);
        $this->assertEquals("550e8400-e29b-41d4-a716-446655440000", $legalPersonID->getValue());
    }
}
