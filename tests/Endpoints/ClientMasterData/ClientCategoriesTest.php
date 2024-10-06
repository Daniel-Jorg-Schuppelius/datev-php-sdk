<?php

namespace Tests\Endpoints\Diagnostics;

use Datev\API\Desktop\Endpoints\ClientMasterData\ClientCategoriesEndpoint;
use Datev\API\Desktop\Endpoints\ClientMasterData\ClientsEndpoint;
use Datev\Entities\ClientMasterData\ClientCategories\ClientCategories;
use Datev\Entities\ClientMasterData\ClientCategories\ClientCategory;
use Tests\Contracts\EndpointTest;

class ClientCategoriesTest extends EndpointTest {
    protected ?ClientsEndpoint $preEndpoint;
    protected ?ClientCategoriesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->preEndpoint = new ClientsEndpoint($this->client, $this->logger);
        $this->endpoint = new ClientCategoriesEndpoint($this->client, $this->logger);
        $this->apiDisabled = true; // API is disabled
    }

    public function testGetClientCategories() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $clients = $this->preEndpoint->search();
        $randomClient = $clients->getValues()[array_rand($clients->getValues())];
        $this->endpoint->setClientID($randomClient->getId());

        $clientCategories = $this->endpoint->searchByClient();
        $allClientCategories = $this->endpoint->search();
        $this->assertInstanceOf(ClientCategories::class, $clientCategories);
        $this->assertInstanceOf(ClientCategories::class, $allClientCategories);
        $this->assertNotEmpty($allClientCategories->getValues(), "No allClientCategories found");
        $this->assertNotEmpty($clientCategories->getValues(), "No clientCategories found");
        $randomClientCategory = $clientCategories->getValues()[array_rand($clientCategories->getValues())];
        $this->assertInstanceOf(ClientCategory::class, $randomClientCategory);
        $clientCategory = $this->endpoint->get($randomClientCategory->getId());
        $this->assertInstanceOf(ClientCategory::class, $randomClientCategory);
        $this->assertEquals($randomClientCategory->getId(), $clientCategory->getId());
    }
}
