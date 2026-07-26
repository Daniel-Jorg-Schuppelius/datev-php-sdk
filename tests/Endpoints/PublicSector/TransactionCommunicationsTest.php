<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionCommunicationsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\PublicSector;

use Datev\API\Desktop\Endpoints\PublicSector\TransactionCommunicationsEndpoint;
use Tests\Contracts\EndpointTest;

class TransactionCommunicationsTest extends EndpointTest {
    protected TransactionCommunicationsEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new TransactionCommunicationsEndpoint($this->client, self::getLogger());
    }

    public function test_get_transaction_communications(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $communications = $this->endpoint->search();
        $this->assertNotNull($communications);
    }
}
