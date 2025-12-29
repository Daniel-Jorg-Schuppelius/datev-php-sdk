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
    protected ?ServiceProviderConfigEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new ServiceProviderConfigEndpoint($this->client, $this->logger);
        $this->apiDisabled = true; // API is disabled
    }

    public function testJsonSerialize() {
        $data = [
            "schemas" => ["urn:ietf:params:scim:schemas:core:2.0:ServiceProviderConfig"],
            "documentation_uri" => "https://www.datev.de/developer/",
            "patch" => ["supported" => true],
            "bulk" => [
                "supported" => true,
                "max_operations" => 1000,
                "max_payload_size" => 1048576
            ],
            "filter" => [
                "supported" => false,
                "max_results" => 0
            ],
            "change_password" => ["supported" => false],
            "sort" => ["supported" => false],
            "etag" => ["supported" => true]
        ];

        $config = new ServiceProviderConfig($data);
        $this->assertInstanceOf(ServiceProviderConfig::class, $config);
        $this->assertTrue($config->getPatch()->isSupported());
        $this->assertTrue($config->getBulk()->isSupported());
        $this->assertEquals(1000, $config->getBulk()->getMaxOperations());
        $this->assertFalse($config->getFilter()->isSupported());
    }

    public function testGetServiceProviderConfig() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $config = $this->endpoint->get();
        $this->assertInstanceOf(ServiceProviderConfig::class, $config);
    }
}
