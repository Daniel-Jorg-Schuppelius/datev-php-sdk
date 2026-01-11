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
    protected ?InfoEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new InfoEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true; // API is disabled
    }

    public function testCreateAndDeleteArticleAPI() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $info = $this->endpoint->get();
        $this->assertInstanceOf(Info::class, $info);
        $this->assertNotEmpty($info->getVersions(), "No versions found");
        $randomVersion = $info->getVersions()->getValues()[array_rand($info->getVersions()->toArray())];
        $this->assertInstanceOf(Version::class, $randomVersion);
    }
}
