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
    protected ?TransactionAddressesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new TransactionAddressesEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetTransactionAddresses() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $addresses = $this->endpoint->search();
        $this->assertNotNull($addresses);
    }
}
