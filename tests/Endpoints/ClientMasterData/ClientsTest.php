<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Diagnostics;

use Datev\API\Desktop\Endpoints\ClientMasterData\ClientsEndpoint;
use Datev\Entities\ClientMasterData\Clients\Client;
use Datev\Entities\ClientMasterData\Clients\Clients;
use Tests\Contracts\EndpointTest;

class ClientsTest extends EndpointTest {
    protected ?ClientsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new ClientsEndpoint($this->client, $this->logger);
        $this->apiDisabled = true; // API is disabled
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
        $this->assertInstanceOf(Client::class, $randomClient);
        $this->assertEquals($randomClient->getId(), $client->getId());
    }
}
