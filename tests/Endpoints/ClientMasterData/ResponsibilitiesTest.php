<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ResponsibilitiesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\ResponsibilitiesEndpoint;
use Tests\Contracts\EndpointTest;

class ResponsibilitiesTest extends EndpointTest {
    protected ?ResponsibilitiesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new ResponsibilitiesEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetResponsibilities() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $responsibilities = $this->endpoint->search();
        $this->assertNotNull($responsibilities);
    }
}
