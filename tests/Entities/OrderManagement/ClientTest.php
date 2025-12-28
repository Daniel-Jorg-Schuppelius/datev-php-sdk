<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\OrderManagement\Clients\Client;
use Datev\Entities\OrderManagement\Clients\Clients;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateClient() {
        $data = [
            "id" => "c1234567-8901-2345-6789-012345678901",
            "client_number" => "10001",
            "client_name" => "Mustermann GmbH",
            "isactive" => true
        ];

        $client = new Client($data, $this->logger);
        $this->assertInstanceOf(Client::class, new Client());
        $this->assertInstanceOf(Client::class, $client);
        $this->assertEquals("10001", $client->getClientNumber());
        $this->assertEquals("Mustermann GmbH", $client->getClientName());
        $this->assertTrue($client->isActive());
    }

    public function testCreateClients() {
        $data = [
            "content" => [
                [
                    "id" => "c1234567-8901-2345-6789-012345678901",
                    "client_name" => "Kunde 1"
                ],
                [
                    "id" => "c2234567-8901-2345-6789-012345678902",
                    "client_name" => "Kunde 2"
                ]
            ]
        ];

        $clients = new Clients($data, $this->logger);
        $this->assertInstanceOf(Clients::class, $clients);
        $this->assertCount(2, $clients->getValues());
    }
}
