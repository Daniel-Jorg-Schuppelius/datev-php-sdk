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

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\TransactionRegistrations\TransactionRegistrationData;

class TransactionRegistrationDataTest extends EntityTest {
    public function testCreateTransactionRegistrationData(): void {
        $data = [
            "id" => "reg-001",
            "is_registered" => true,
            "registration_email" => "user@example.com"
        ];

        $registrationData = new TransactionRegistrationData($data);

        $this->assertInstanceOf(TransactionRegistrationData::class, $registrationData);
        $this->assertEquals("reg-001", $registrationData->getID());
        $this->assertTrue($registrationData->isRegistered());
        $this->assertEquals("user@example.com", $registrationData->getRegistrationEmail());
    }

    public function testUnregisteredData(): void {
        $data = [
            "id" => "reg-002",
            "is_registered" => false,
            "registration_email" => null
        ];

        $registrationData = new TransactionRegistrationData($data);

        $this->assertFalse($registrationData->isRegistered());
        $this->assertNull($registrationData->getRegistrationEmail());
    }
}
