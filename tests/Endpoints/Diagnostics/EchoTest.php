<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EchoTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Diagnostics;

use Datev\API\Desktop\Endpoints\Diagnostics\EchoEndpoint;
use Tests\Contracts\EndpointTest;

class EchoTest extends EndpointTest {
    protected ?EchoEndpoint $endpoint = null;

    protected string $mockDomain = 'diagnostics';

    protected function createEndpoint(): EchoEndpoint {
        return new EchoEndpoint($this->client, self::getLogger());
    }

    public function testGetEcho(): void {
        $this->endpoint = $this->createEndpoint();

        $echo = $this->endpoint->get();

        if ($this->isUsingMock()) {
            // Im Mock-Modus: Prüfe dass ein Ergebnis zurückkommt
            $this->assertNotNull($echo, 'Mock should return EchoResponse');
        } else {
            // Im Live-Modus: Normale Assertions
            $this->assertNotNull($echo);
        }
    }
}
