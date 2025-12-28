<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionRegistrationDataTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\TransactionRegistrations\TransactionRegistrationData;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class TransactionRegistrationDataTest extends TestCase {
    public function testCreateTransactionRegistrationData(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "reg-001",
            "is_registered" => true,
            "registration_email" => "user@example.com"
        ];

        $registrationData = new TransactionRegistrationData($data, $logger);

        $this->assertInstanceOf(TransactionRegistrationData::class, $registrationData);
        $this->assertEquals("reg-001", $registrationData->getID());
        $this->assertTrue($registrationData->isRegistered());
        $this->assertEquals("user@example.com", $registrationData->getRegistrationEmail());
    }

    public function testUnregisteredData(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "reg-002",
            "is_registered" => false,
            "registration_email" => null
        ];

        $registrationData = new TransactionRegistrationData($data, $logger);

        $this->assertFalse($registrationData->isRegistered());
        $this->assertNull($registrationData->getRegistrationEmail());
    }
}
