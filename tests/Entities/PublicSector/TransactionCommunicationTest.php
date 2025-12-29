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

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\PublicSector\TransactionCommunications\TransactionCommunication;
use Datev\Entities\PublicSector\TransactionCommunications\TransactionCommunications;
use PHPUnit\Framework\TestCase;

class TransactionCommunicationTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateTransactionCommunication() {
        $data = [
            "id" => 12345,
            "status" => "sent"
        ];

        $comm = new TransactionCommunication($data, $this->logger);
        $this->assertInstanceOf(TransactionCommunication::class, new TransactionCommunication());
        $this->assertInstanceOf(TransactionCommunication::class, $comm);
        $this->assertEquals(12345, $comm->getID());
        $this->assertEquals("sent", $comm->getStatus());
    }

    public function testCreateTransactionCommunications() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "status" => "sent"
                ],
                [
                    "id" => 2,
                    "status" => "pending"
                ]
            ]
        ];

        $comms = new TransactionCommunications($data, $this->logger);
        $this->assertInstanceOf(TransactionCommunications::class, $comms);
        $this->assertCount(2, $comms->getValues());
    }
}
