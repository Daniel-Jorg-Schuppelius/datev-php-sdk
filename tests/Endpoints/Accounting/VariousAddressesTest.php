<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VariousAddressesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Accounting;

use Datev\API\Desktop\Endpoints\Accounting\VariousAddressesEndpoint;
use Tests\Contracts\EndpointTest;

class VariousAddressesTest extends EndpointTest {
    protected ?VariousAddressesEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): VariousAddressesEndpoint {
        return new VariousAddressesEndpoint($this->client, self::getLogger());
    }

    public function testGetVariousAddresses() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $addresses = $this->endpoint->search();

        if ($this->isUsingMock()) {
            $this->assertNotNull($addresses);
        } else {
            $this->assertNotNull($addresses);
        }
    }
}
