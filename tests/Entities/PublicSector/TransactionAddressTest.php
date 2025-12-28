<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionAddressTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\PublicSector\TransactionAddresses\TransactionAddress;
use Datev\Entities\PublicSector\TransactionAddresses\TransactionAddresses;
use PHPUnit\Framework\TestCase;

class TransactionAddressTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateTransactionAddress() {
        $data = [
            "id" => 12345,
            "status" => "active",
            "notification_e_mail" => "test@example.com"
        ];

        $address = new TransactionAddress($data, $this->logger);
        $this->assertInstanceOf(TransactionAddress::class, new TransactionAddress());
        $this->assertInstanceOf(TransactionAddress::class, $address);
        $this->assertEquals(12345, $address->getID());
        $this->assertEquals("active", $address->getStatus());
        $this->assertEquals("test@example.com", $address->getNotificationEmail());
    }

    public function testCreateTransactionAddresses() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "status" => "active"
                ],
                [
                    "id" => 2,
                    "status" => "inactive"
                ]
            ]
        ];

        $addresses = new TransactionAddresses($data, $this->logger);
        $this->assertInstanceOf(TransactionAddresses::class, $addresses);
        $this->assertCount(2, $addresses->getValues());
    }
}
