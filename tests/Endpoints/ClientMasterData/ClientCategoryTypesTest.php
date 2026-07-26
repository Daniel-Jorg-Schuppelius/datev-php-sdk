<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientCategoryTypesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\ClientCategoryTypesEndpoint;
use Tests\Contracts\EndpointTest;

class ClientCategoryTypesTest extends EndpointTest {
    protected ClientCategoryTypesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new ClientCategoryTypesEndpoint($this->client, self::getLogger());
    }

    public function test_get_client_category_types(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $categoryTypes = $this->endpoint->search();
        $this->assertNotNull($categoryTypes);
    }
}
