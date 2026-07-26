<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : InfoTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\DocumentManagement;

use Datev\API\Desktop\Endpoints\DocumentManagement\InfoEndpoint;
use Datev\Entities\DocumentManagement\Infos\Info;
use Datev\Entities\DocumentManagement\Versions\Version;
use Tests\Contracts\EndpointTest;

class InfoTest extends EndpointTest {
    protected InfoEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new InfoEndpoint($this->client, self::getLogger());
    }

    public function test_create_and_delete_article_api(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $info = $this->endpoint->get();
        $this->assertInstanceOf(Info::class, $info);
        $versions = $info->getVersions();
        $this->assertNotNull($versions, "No versions found");
        $this->assertNotEmpty($versions, "No versions found");
        $randomVersion = $versions->getValues()[array_rand($versions->toArray())];
        $this->assertInstanceOf(Version::class, $randomVersion);
    }
}
