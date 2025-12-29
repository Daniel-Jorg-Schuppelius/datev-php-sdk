<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LinkedDatacenterIdentityTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Datev\Entities\IdentityAndAccessManagement\Users\LinkedDatacenterIdentity;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class LinkedDatacenterIdentityTest extends TestCase {
    public function testCreateLinkedDatacenterIdentity(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "value" => 12345
        ];

        $identity = new LinkedDatacenterIdentity($data, $logger);

        $this->assertInstanceOf(LinkedDatacenterIdentity::class, $identity);
        $this->assertEquals(12345, $identity->getValue());
    }

    public function testNullValue(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [];

        $identity = new LinkedDatacenterIdentity($data, $logger);

        $this->assertNull($identity->getValue());
    }
}
