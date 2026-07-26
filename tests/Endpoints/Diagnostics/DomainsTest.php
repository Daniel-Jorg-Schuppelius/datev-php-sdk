<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DomainsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Diagnostics;

use Datev\API\Desktop\Endpoints\Diagnostics\DomainsEndpoint;
use Datev\Entities\Diagnostics\Domains\{Domain, Domains};
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
            "Key" => "accounting",
            "Value" => "v1",
        ];

        $domain = new Domain($data);
        $this->assertEquals($data, $domain->toArray());
        $this->assertEquals(json_encode($data), $domain->toJson());  // the order of the $data array is important for this test.
    }

    public function test_create_and_delete_article_api(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $domains = $this->endpoint->get();
        $this->assertInstanceOf(Domains::class, $domains);
    }
}
