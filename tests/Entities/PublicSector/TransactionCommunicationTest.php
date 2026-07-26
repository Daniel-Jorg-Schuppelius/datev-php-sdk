<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionCommunicationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\TransactionCommunications\{TransactionCommunication, TransactionCommunications};
use Tests\Contracts\EntityTest;

class TransactionCommunicationTest extends EntityTest {
    public function test_create_transaction_communication(): void {
        $data = [
            "id" => 12345,
            "status" => "sent",
        ];

        $comm = new TransactionCommunication($data);
        $this->assertInstanceOf(TransactionCommunication::class, new TransactionCommunication);
        $this->assertInstanceOf(TransactionCommunication::class, $comm);
        $this->assertEquals(12345, $comm->getID());
        $this->assertEquals("sent", $comm->getStatus());
    }

    public function test_create_transaction_communications(): void {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "status" => "sent",
                ],
                [
                    "id" => 2,
                    "status" => "pending",
                ],
            ],
        ];

        $comms = new TransactionCommunications($data);
        $this->assertInstanceOf(TransactionCommunications::class, $comms);
        $this->assertCount(2, $comms->getValues());
    }
}
