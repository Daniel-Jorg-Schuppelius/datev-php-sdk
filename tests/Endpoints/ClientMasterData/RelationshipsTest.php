<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RelationshipsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\RelationshipsEndpoint;
use Tests\Contracts\EndpointTest;

class RelationshipsTest extends EndpointTest {
    protected RelationshipsEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new RelationshipsEndpoint($this->client, self::getLogger());
    }

    public function test_get_relationships(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $relationships = $this->endpoint->search();
        $this->assertNotNull($relationships);
    }
}
