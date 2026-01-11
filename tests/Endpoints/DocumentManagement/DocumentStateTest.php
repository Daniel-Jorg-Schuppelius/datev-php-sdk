<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentStateTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

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
        $this->endpoint = new DocumentStatesEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true; // API is disabled
    }

    public function testJsonSerialize() {
        $data = [
            "consultant_number" => "29115",
            "id" => "9351b0e3-e96b-4bb0-b94e-018b13d1db28",
            "name" => "Küchenbeispiel",
            "number" => 55039,
        ];

        $data1 = [
            "id" => "9351b0e3-e96b-4bb0-b94e-018b13d1db28",
            "name" => "Küchenbeispiel",
            "number" => 55039
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
        $client = $this->endpoint->get($randomDocumentState->getID());
        $this->assertInstanceOf(DocumentState::class, $client);
        $this->assertEquals($randomDocumentState->getID(), $client->getID());
    }
}