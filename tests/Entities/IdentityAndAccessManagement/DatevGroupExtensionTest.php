<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DatevGroupExtensionTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Datev\Entities\IdentityAndAccessManagement\Groups\DatevGroupExtension;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class DatevGroupExtensionTest extends TestCase {
    public function testCreateDatevGroupExtension(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "description" => "Administrative Benutzergruppe für IT-Mitarbeiter"
        ];

        $extension = new DatevGroupExtension($data, $logger);

        $this->assertInstanceOf(DatevGroupExtension::class, $extension);
        $this->assertEquals("Administrative Benutzergruppe für IT-Mitarbeiter", $extension->getDescription());
    }
}
