<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\AccountEndpoint;
use Tests\Contracts\EndpointTest;

class AccountTest extends EndpointTest {
    protected ?AccountEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): AccountEndpoint {
        return new AccountEndpoint($this->client, self::getLogger());
    }

    public function testGetAccount() {
        $this->endpoint = $this->createEndpoint();
        $accounts = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        if ($this->isUsingMock()) {
            $this->assertNotNull($accounts);
        } else {
            $this->assertNotNull($accounts);
        }
    }
}
