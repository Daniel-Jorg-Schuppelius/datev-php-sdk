<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\DocumentManagement;

use Datev\API\Desktop\Endpoints\DocumentManagement\DocumentsEndpoint;
use Datev\Entities\DocumentManagement\Documents\Document;
use Datev\Entities\DocumentManagement\Documents\Documents;
use Datev\Entities\Payroll\Clients\Client;
use Tests\Contracts\EndpointTest;

class DocumentTest extends EndpointTest {
    protected ?DocumentsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new DocumentsEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true; // API is disabled
    }

    public function testJsonSerialize() {
        $data = [
            "consultant_number" => "29115",
            "id" => "9351b0e3-e96b-4bb0-b94e-018b13d1db28",
            "name" => "Küchenbeispiel",
            "number" => 55039
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

    public function testCreateAndDeleteArticleAPI() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $documents = $this->endpoint->search();
        $this->assertInstanceOf(Documents::class, $documents);
        $this->assertNotEmpty($documents->getValues(), "No documents found");
        $randomDocument = $documents->getValues()[array_rand($documents->getValues())];
        $this->assertInstanceOf(Document::class, $randomDocument);
        $document = $this->endpoint->get($randomDocument->getID());
        $this->assertInstanceOf(Document::class, $document);
        $this->assertEquals($randomDocument->getID(), $document->getID());
    }
}
