<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RelationshipTypesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\RelationshipTypesEndpoint;
use Tests\Contracts\EndpointTest;

class RelationshipTypesTest extends EndpointTest {
    protected RelationshipTypesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new RelationshipTypesEndpoint($this->client, self::getLogger());
    }

    public function test_get_relationship_types(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $types = $this->endpoint->search();
        $this->assertNotNull($types);
    }
}
