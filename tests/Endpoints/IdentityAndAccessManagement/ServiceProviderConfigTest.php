<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ServiceProviderConfigTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\IdentityAndAccessManagement;

use Datev\API\Desktop\Endpoints\IdentityAndAccessManagement\ServiceProviderConfigEndpoint;
use Datev\Entities\IdentityAndAccessManagement\ServiceProvider\ServiceProviderConfig;
use Tests\Contracts\EndpointTest;

class ServiceProviderConfigTest extends EndpointTest {
    protected ServiceProviderConfigEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new ServiceProviderConfigEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            "schemas" => ["urn:ietf:params:scim:schemas:core:2.0:ServiceProviderConfig"],
            "documentation_uri" => "https://www.datev.de/developer/",
            "patch" => ["supported" => true],
            "bulk" => [
                "supported" => true,
                "max_operations" => 1000,
                "max_payload_size" => 1048576,
            ],
            "filter" => [
                "supported" => false,
                "max_results" => 0,
            ],
            "change_password" => ["supported" => false],
            "sort" => ["supported" => false],
            "etag" => ["supported" => true],
        ];

        $config = new ServiceProviderConfig($data);
        $this->assertInstanceOf(ServiceProviderConfig::class, $config);

        $patch = $config->getPatch();
        $this->assertNotNull($patch);
        $this->assertTrue($patch->isSupported());

        $bulk = $config->getBulk();
        $this->assertNotNull($bulk);
        $this->assertTrue($bulk->isSupported());
        $this->assertEquals(1000, $bulk->getMaxOperations());

        $filter = $config->getFilter();
        $this->assertNotNull($filter);
        $this->assertFalse($filter->isSupported());
    }

    public function test_get_service_provider_config(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $config = $this->endpoint->get();
        $this->assertInstanceOf(ServiceProviderConfig::class, $config);
    }
}
