<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LinkedIdentityTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Datev\Entities\IdentityAndAccessManagement\Users\LinkedIdentity;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class LinkedIdentityTest extends TestCase {
    public function testCreateLinkedIdentity(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "value" => "DOMAIN\\username"
        ];

        $identity = new LinkedIdentity($data, $logger);

        $this->assertInstanceOf(LinkedIdentity::class, $identity);
        $this->assertEquals("DOMAIN\\username", $identity->getValue());
    }
}
