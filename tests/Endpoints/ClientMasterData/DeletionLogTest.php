<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DeletionLogTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\DeletionLogEndpoint;
use Tests\Contracts\EndpointTest;

class DeletionLogTest extends EndpointTest {
    protected DeletionLogEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new DeletionLogEndpoint($this->client, self::getLogger());
    }

    public function test_get_deletion_log(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $log = $this->endpoint->search();
        $this->assertNotNull($log);
    }
}
