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
    protected ?VersionEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new VersionEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetVersion() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $version = $this->endpoint->search();
        $this->assertNotNull($version);
    }
}
