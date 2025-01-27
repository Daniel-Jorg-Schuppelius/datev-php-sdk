<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Accounting;

use Datev\API\Desktop\Endpoints\Accounting\ClientsEndpoint;
use Datev\Entities\Accounting\Clients\Client;
use Datev\Entities\Accounting\Clients\Clients;
use Tests\Contracts\EndpointTest;

class ClientTest extends EndpointTest {
    protected ?ClientsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new ClientsEndpoint($this->client, $this->logger);
        $this->apiDisabled = true; // API is disabled
    }

    public function testJsonSerialize() {
        $data = [
            "id" => "9351B0E3-E96B-4BB0-B94E-018B13D1DB28",
            "name" => "Küchenbeispiel",
            "number" => 55039,
        ];

        $data1 = [
            "company_data" => [
                "creditor_identifier" => "DE98ZZZ09999999999"
            ],
            "id" => "9351b0e3-e96b-4bb0-b94e-018b13d1db28",
            "name" => "Küchenbeispiel",
            "number" => 55039
        ];

        $client = new Client($data);
        $client1 = new Client($data1);
        $this->assertNotEquals($data, $client->toArray());
        $this->assertEquals($data1, $client1->toArray());
        $this->assertEquals(json_encode($data1), $client1->toJson());  // the order of the $data array is important for this test.
    }

    public function testGetClients() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $clients = $this->endpoint->search();
        $this->assertInstanceOf(Clients::class, $clients);
        $this->assertNotEmpty($clients->getValues(), "No clients found");
        $randomClient = $clients->getValues()[array_rand($clients->getValues())];
        $this->assertInstanceOf(Client::class, $randomClient);
        $client = $this->endpoint->get($randomClient->getId());
        $this->assertInstanceOf(Client::class, $client);
        $this->assertEquals($randomClient->getId(), $client->getId());
    }
}
