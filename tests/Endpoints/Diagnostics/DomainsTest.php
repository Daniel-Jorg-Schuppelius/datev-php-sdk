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
use Datev\Entities\Diagnostics\Domains\Domain;
use Datev\Entities\Diagnostics\Domains\Domains;
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
            "Key" => "accounting",
            "Value" => "v1"
        ];

        $domain = new Domain($data);
        $this->assertEquals($data, $domain->toArray());
        $this->assertEquals(json_encode($data), $domain->toJson());  // the order of the $data array is important for this test.
    }

    public function testCreateAndDeleteArticleAPI() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $domains = $this->endpoint->get();
        $this->assertInstanceOf(Domains::class, $domains);
    }
}
