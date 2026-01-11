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
    protected ?ClientsEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): ClientsEndpoint {
        return new ClientsEndpoint($this->client, self::getLogger());
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
        $this->endpoint = $this->createEndpoint();

        $clients = $this->endpoint->search();

        if ($this->isUsingMock()) {
            $this->assertNotNull($clients);
        } else {
            $this->assertInstanceOf(Clients::class, $clients);
            $this->assertNotEmpty($clients->getValues(), "No clients found");
            $randomClient = $clients->getValues()[array_rand($clients->getValues())];
            $this->assertInstanceOf(Client::class, $randomClient);
            $client = $this->endpoint->get($randomClient->getID());
            $this->assertInstanceOf(Client::class, $client);
            $this->assertEquals($randomClient->getID(), $client->getID());
        }
    }
}
