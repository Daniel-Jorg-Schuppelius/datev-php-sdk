<?php

namespace Tests\Endpoints\DocumentManagement;

use Datev\API\Desktop\Endpoints\DocumentManagement\DocumentStatesEndpoint;
use Datev\Entities\DocumentManagement\Documents\States\DocumentState;
use Datev\Entities\DocumentManagement\Documents\States\DocumentStates;
use Datev\Entities\Payroll\Clients\Client;
use Tests\Contracts\EndpointTest;

class DocumentStateTest extends EndpointTest {
    protected ?DocumentStatesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new DocumentStatesEndpoint($this->client, $this->logger);
        $this->apiDisabled = false; // API is disabled
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

    public function testDocumentStatesAPI() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $documentStates = $this->endpoint->search();
        $this->assertInstanceOf(DocumentStates::class, $documentStates);
        $this->assertNotEmpty($documentStates->getValues(), "No documentStates found");
        $randomDocumentState = $documentStates->getValues()[array_rand($documentStates->getValues())];
        $this->assertInstanceOf(DocumentState::class, $randomDocumentState);
        $client = $this->endpoint->get($randomDocumentState->getId());
        $this->assertInstanceOf(DocumentState::class, $client);
        $this->assertEquals($randomDocumentState->getId(), $client->getId());
    }
}
