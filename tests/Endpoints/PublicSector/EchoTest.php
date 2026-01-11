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
    protected ?EchoEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new EchoEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetEcho() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $echo = $this->endpoint->search();
        $this->assertNotNull($echo);
    }
}
