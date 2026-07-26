<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DomainsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\DocumentManagement;

use Datev\API\Desktop\Endpoints\DocumentManagement\DomainsEndpoint;
use Datev\Entities\DocumentManagement\Domains\{Domain, Domains};
use Datev\Entities\Payroll\Clients\Client;
use Tests\Contracts\EndpointTest;

class DomainsTest extends EndpointTest {
    protected DomainsEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new DomainsEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            "consultant_number" => "29115",
            "id" => "9351b0e3-e96b-4bb0-b94e-018b13d1db28",
            "name" => "Küchenbeispiel",
            "number" => 55039,
        ];

        $data1 = [
            "id" => "9351b0e3-e96b-4bb0-b94e-018b13d1db28",
            "name" => "Küchenbeispiel",
            "number" => 55039,
        ];

        $client = new Client($data);
        $client1 = new Client($data1);
        $this->assertEquals($data, $client->toArray());
        $this->assertEquals($data1, $client1->toArray());
        $this->assertEquals(json_encode($data), $client->toJson());  // the order of the $data array is important for this test.
    }

    public function test_create_and_delete_article_api(): void {
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
