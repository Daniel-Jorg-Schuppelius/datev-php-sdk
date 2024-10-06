<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\ClientsEndpoint;
use Datev\Entities\Payroll\Clients\Client;
use Datev\Entities\Payroll\Clients\Clients;
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
            "consultant_number" => "29115",
            "number" => 55039,
            "name" => "Küchenbeispiel",
        ];

        $data1 = [
            "id" => "9351B0E3-E96B-4BB0-B94E-018B13D1DB28",
            "number" => 55039,
            "name" => "Küchenbeispiel"
        ];

        $client = new Client($data);
        $client1 = new Client($data1);
        $this->assertEquals($data, $client->toArray());
        $this->assertEquals($data1, $client1->toArray());
        $this->assertEquals(json_encode($data), $client->toJson());  // the order of the $data array is important for this test.
    }

    public function testCreateAndDeleteArticleAPI() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $clients = $this->endpoint->search(["reference-date" => "2021-01-01"]);
        $this->assertInstanceOf(Clients::class, $clients);
        $this->assertNotEmpty($clients->getValues(), "No clients found");
        $randomClient = $clients->getValues()[array_rand($clients->getValues())];
        $this->assertInstanceOf(Client::class, $randomClient);
        $client = $this->endpoint->get($randomClient->getId(), "all", new \DateTime("2021-01-01"));
        $this->assertInstanceOf(Client::class, $client);
        $this->assertEquals($randomClient->getId(), $client->getId());
    }
}
