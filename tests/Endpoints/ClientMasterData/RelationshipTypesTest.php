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
    protected ?RelationshipTypesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new RelationshipTypesEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetRelationshipTypes() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $types = $this->endpoint->search();
        $this->assertNotNull($types);
    }
}
