<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CorporateStructuresTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\CorporateStructuresEndpoint;
use Tests\Contracts\EndpointTest;

class CorporateStructuresTest extends EndpointTest {
    protected CorporateStructuresEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new CorporateStructuresEndpoint($this->client, self::getLogger());
    }

    public function test_get_corporate_structures(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $structures = $this->endpoint->search();
        $this->assertNotNull($structures);
    }
}
