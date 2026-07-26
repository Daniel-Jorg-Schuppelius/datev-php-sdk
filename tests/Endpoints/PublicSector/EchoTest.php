<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EchoTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\PublicSector;

use Datev\API\Desktop\Endpoints\PublicSector\EchoEndpoint;
use Tests\Contracts\EndpointTest;

class EchoTest extends EndpointTest {
    protected EchoEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new EchoEndpoint($this->client, self::getLogger());
    }

    public function test_get_echo(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $echo = $this->endpoint->get();
        $this->assertNotNull($echo);
    }
}
