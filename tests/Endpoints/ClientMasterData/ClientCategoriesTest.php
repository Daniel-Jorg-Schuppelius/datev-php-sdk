<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientCategoriesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\{ClientCategoriesEndpoint, ClientsEndpoint};
use Datev\Entities\ClientMasterData\ClientCategories\{ClientCategories, ClientCategory};
use Tests\Contracts\EndpointTest;

class ClientCategoriesTest extends EndpointTest {
    protected ClientsEndpoint $preEndpoint;
    protected ClientCategoriesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true; // API is disabled
        parent::setUp();
        $this->preEndpoint = new ClientsEndpoint($this->client, self::getLogger());
        $this->endpoint = new ClientCategoriesEndpoint($this->client, self::getLogger());
    }

    public function test_get_client_categories(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $clients = $this->preEndpoint->search();
        $this->assertNotNull($clients);
        $randomClient = $clients->getValues()[array_rand($clients->getValues())];
        $clientID = $randomClient->getID();
        $this->assertNotNull($clientID);
        $this->endpoint->setClientID($clientID);

        $clientCategories = $this->endpoint->searchByClient();
        $allClientCategories = $this->endpoint->search();
        $this->assertInstanceOf(ClientCategories::class, $clientCategories);
        $this->assertInstanceOf(ClientCategories::class, $allClientCategories);
        $this->assertNotEmpty($allClientCategories->getValues(), "No allClientCategories found");
        $this->assertNotEmpty($clientCategories->getValues(), "No clientCategories found");
        $randomClientCategory = $clientCategories->getValues()[array_rand($clientCategories->getValues())];
        $this->assertInstanceOf(ClientCategory::class, $randomClientCategory);
        $clientCategory = $this->endpoint->get($randomClientCategory->getID());
        $this->assertInstanceOf(ClientCategory::class, $randomClientCategory);
        $this->assertEquals($randomClientCategory->getID(), $clientCategory?->getID());
    }
}
