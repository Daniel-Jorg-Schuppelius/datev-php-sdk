<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionRegistrationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\TransactionRegistrations\{TransactionRegistration, TransactionRegistrations};
use Tests\Contracts\EntityTest;

class TransactionRegistrationTest extends EntityTest {
    public function test_create_transaction_registration() {
        $data = [
            "id" => 12345,
            "status" => "registered",
        ];

        $reg = new TransactionRegistration($data);
        $this->assertInstanceOf(TransactionRegistration::class, new TransactionRegistration);
        $this->assertInstanceOf(TransactionRegistration::class, $reg);
        $this->assertEquals(12345, $reg->getID());
        $this->assertEquals("registered", $reg->getStatus());
    }

    public function test_create_transaction_registrations() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "status" => "registered",
                ],
                [
                    "id" => 2,
                    "status" => "pending",
                ],
            ],
        ];

        $regs = new TransactionRegistrations($data);
        $this->assertInstanceOf(TransactionRegistrations::class, $regs);
        $this->assertCount(2, $regs->getValues());
    }
}
