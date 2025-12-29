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
    protected ?TransactionCommunicationsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new TransactionCommunicationsEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetTransactionCommunications() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $communications = $this->endpoint->search();
        $this->assertNotNull($communications);
    }
}
