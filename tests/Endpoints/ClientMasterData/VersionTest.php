<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VersionTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\VersionEndpoint;
use Tests\Contracts\EndpointTest;

class VersionTest extends EndpointTest {
    protected VersionEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new VersionEndpoint($this->client, self::getLogger());
    }

    public function test_get_version(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $version = $this->endpoint->get();
        $this->assertNotNull($version);
    }
}
