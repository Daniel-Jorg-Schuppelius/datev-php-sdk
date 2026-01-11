<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionRegistrationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\PublicSector;

use Datev\API\Desktop\Endpoints\PublicSector\TransactionRegistrationEndpoint;
use Tests\Contracts\EndpointTest;

class TransactionRegistrationTest extends EndpointTest {
    protected ?TransactionRegistrationEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new TransactionRegistrationEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetTransactionRegistration() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $registration = $this->endpoint->search();
        $this->assertNotNull($registration);
    }
}
