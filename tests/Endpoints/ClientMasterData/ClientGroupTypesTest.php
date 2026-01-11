<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientGroupTypesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\ClientGroupTypesEndpoint;
use Tests\Contracts\EndpointTest;

class ClientGroupTypesTest extends EndpointTest {
    protected ?ClientGroupTypesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new ClientGroupTypesEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetClientGroupTypes() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $groupTypes = $this->endpoint->search();
        $this->assertNotNull($groupTypes);
    }
}
