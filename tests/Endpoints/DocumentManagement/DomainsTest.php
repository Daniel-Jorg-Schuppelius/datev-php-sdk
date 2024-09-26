<?php

namespace Tests\Endpoints\DocumentManagement;

use Datev\API\Desktop\Endpoints\DocumentManagement\DomainsEndpoint;
use Datev\Entities\DocumentManagement\Domains\Domain;
use Datev\Entities\DocumentManagement\Domains\Domains;
use Datev\Entities\Payroll\Clients\Client;
use Tests\Contracts\EndpointTest;

class DomainsTest extends EndpointTest {
    protected ?DomainsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new DomainsEndpoint($this->client, $this->logger);
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

        $domains = $this->endpoint->search(["reference-date" => "2021-01-01"]);
        $this->assertInstanceOf(Domains::class, $domains);
        $this->assertNotEmpty($domains->getValues(), "No domains found");
        $randomDomain = $domains->getValues()[array_rand($domains->getValues())];
        $this->assertInstanceOf(Domain::class, $randomDomain);
    }
}
