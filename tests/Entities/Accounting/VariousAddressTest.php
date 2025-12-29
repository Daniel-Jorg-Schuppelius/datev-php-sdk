<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VariousAddressTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\Accounting\VariousAddresses\VariousAddress;
use Datev\Entities\Accounting\VariousAddresses\VariousAddresses;
use PHPUnit\Framework\TestCase;

class VariousAddressTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateVariousAddress() {
        $data = [
            "id" => "VA-10000",
            "account_number" => 10000,
            "business_partner_number" => "BP-2024-001",
            "caption" => "Musterfirma GmbH",
            "correspondence_title" => "Sehr geehrte Damen und Herren",
            "date_last_modification" => "2024-06-15",
            "legal_entity_type" => "GmbH"
        ];

        $variousAddress = new VariousAddress($data, $this->logger);
        $this->assertInstanceOf(VariousAddress::class, new VariousAddress());
        $this->assertInstanceOf(VariousAddress::class, $variousAddress);
        $this->assertNotNull($variousAddress->getID());
        $this->assertEquals(10000, $variousAddress->getAccountNumber());
        $this->assertEquals("BP-2024-001", $variousAddress->getBusinessPartnerNumber());
        $this->assertEquals("Musterfirma GmbH", $variousAddress->getCaption());
        $this->assertEquals("GmbH", $variousAddress->getLegalEntityType());
    }

    public function testCreateVariousAddresses() {
        $data = [
            "content" => [
                [
                    "id" => "VA-10000",
                    "account_number" => 10000,
                    "caption" => "Musterfirma GmbH"
                ],
                [
                    "id" => "VA-20000",
                    "account_number" => 20000,
                    "caption" => "Beispiel AG"
                ]
            ]
        ];

        $variousAddresses = new VariousAddresses($data, $this->logger);
        $this->assertInstanceOf(VariousAddresses::class, $variousAddresses);
        $this->assertCount(2, $variousAddresses->getValues());
    }
}
