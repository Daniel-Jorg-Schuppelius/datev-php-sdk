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
    protected ?RelationshipsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new RelationshipsEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetRelationships() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $relationships = $this->endpoint->search();
        $this->assertNotNull($relationships);
    }
}
