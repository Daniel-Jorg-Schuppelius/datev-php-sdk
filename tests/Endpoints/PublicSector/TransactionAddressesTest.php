<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionAddressesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\PublicSector;

use Datev\API\Desktop\Endpoints\PublicSector\TransactionAddressesEndpoint;
use Tests\Contracts\EndpointTest;

class TransactionAddressesTest extends EndpointTest {
    protected TransactionAddressesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new TransactionAddressesEndpoint($this->client, self::getLogger());
    }

    public function test_get_transaction_addresses(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $addresses = $this->endpoint->search();
        $this->assertNotNull($addresses);
    }
}
