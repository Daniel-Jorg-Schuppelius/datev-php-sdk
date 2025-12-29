<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ServiceProviderConfigTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Datev\Entities\IdentityAndAccessManagement\ServiceProvider\ServiceProviderConfig;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class ServiceProviderConfigTest extends TestCase {
    public function testCreateServiceProviderConfig() {
        $data = [
            "schemas" => ["urn:ietf:params:scim:schemas:core:2.0:ServiceProviderConfig"],
            "documentation_uri" => "https://example.com/scim/docs",
            "patch" => [
                "supported" => true
            ],
            "bulk" => [
                "supported" => false,
                "max_operations" => 1000,
                "max_payload_size" => 1048576
            ],
            "filter" => [
                "supported" => true,
                "max_results" => 200
            ],
            "change_password" => [
                "supported" => false
            ],
            "sort" => [
                "supported" => false
            ],
            "etag" => [
                "supported" => false
            ]
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $config = new ServiceProviderConfig($data, $logger);

        $this->assertInstanceOf(ServiceProviderConfig::class, $config);
        $this->assertIsArray($config->getSchemas());
        $this->assertEquals("https://example.com/scim/docs", $config->getDocumentationUri());
    }
}
