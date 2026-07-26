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
    protected TransactionRegistrationEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new TransactionRegistrationEndpoint($this->client, self::getLogger());
    }

    public function test_get_transaction_registration(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $registration = $this->endpoint->search();
        $this->assertNotNull($registration);
    }
}
