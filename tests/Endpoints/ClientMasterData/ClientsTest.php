<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\ClientsEndpoint;
use Datev\Entities\ClientMasterData\Clients\Client;
use Datev\Entities\ClientMasterData\Clients\Clients;
use Tests\Contracts\EndpointTest;

class ClientsTest extends EndpointTest {
    protected ?ClientsEndpoint $endpoint = null;

    protected string $mockDomain = 'clientmasterdata';

    protected function createEndpoint(): ClientsEndpoint {
        return new ClientsEndpoint($this->client, self::getLogger());
    }

    public function testGetClients(): void {
        $this->endpoint = $this->createEndpoint();

        $clients = $this->endpoint->search();

        $this->assertInstanceOf(Clients::class, $clients);
        $this->assertNotEmpty($clients->getValues(), "No clients found");

        $randomClient = $clients->getValues()[array_rand($clients->getValues())];
        $this->assertInstanceOf(Client::class, $randomClient);

        if (!$this->isUsingMock()) {
            // Nur im Live-Modus: Einzelnen Client abrufen
            $client = $this->endpoint->get($randomClient->getID());
            $this->assertInstanceOf(Client::class, $client);
            $this->assertEquals($randomClient->getID(), $client->getID());
        }
    }
}
