<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use APIToolkit\Logger\ConsoleLogger;
use APIToolkit\Logger\ConsoleLoggerFactory;
use Datev\Entities\ClientMasterData\Clients\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateAddress() {
        $data = [
            "id" => "d13f9c3c-380c-494e-97c8-d12fff738189",
            "client_since" => "1999-04-15T00:00:00.000+00:00",
            "client_to" => "2017-03-31T00:00:00.000+00:00",
            "differing_name" => "Abweichender Mustermeier",
            "legal_person_id" => "fd3b2877-7505-4811-a53f-cd1c28ef627c",
            "name" => "Mustermeier GmbH",
            "natural_person_id" => "dc187309-392d-4e3b-b1f9-29c581178a06",
            "note" => "Notiz zu Mandant 10000",
            "number" => 10000,
            "status" => "active",
            "timestamp" => "2016-03-31T00:00:00.000+00:00",
            "type" => "legal_person",
            "organization_id" => "f43f9c3g-380c-494e-97c8-d12fff738180",
            "organization_name" => "Musterkanzlei",
            "organization_number" => 1,
            "establishment_id" => "h54f9c3g-380c-494e-97c8-d12fff738187",
            "establishment_name" => "Musterkanzlei - Hauptsitz",
            "establishment_number" => 1,
            "establishment_short_name" => "Hauptsitz",
            "functional_area_id" => "g93e8c3g-380c-494e-97c8-d12fff738371",
            "functional_area_name" => "Gesamtunternehmen",
            "functional_area_short_name" => "999"
        ];

        $client = new Client($data);
        $this->assertFalse($client->isValid());
        $client = new Client($data, $this->logger);
        $this->assertInstanceOf(Client::class, new Client());
        $this->assertInstanceOf(Client::class, $client);
        $this->assertEquals($data, $client->toArray());
    }
}
