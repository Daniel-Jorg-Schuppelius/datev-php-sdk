<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : NextFreeNumberTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\NextFreeNumberEndpoint;
use Tests\Contracts\EndpointTest;

class NextFreeNumberTest extends EndpointTest {
    protected NextFreeNumberEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new NextFreeNumberEndpoint($this->client, self::getLogger());
    }

    public function test_get_next_free_number(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $nextNumber = $this->endpoint->get();
        $this->assertNotNull($nextNumber);
    }
}
