<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CreditorsNextAvailableTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Accounting;

use Datev\API\Desktop\Endpoints\Accounting\CreditorsNextAvailableEndpoint;
use Tests\Contracts\EndpointTest;

class CreditorsNextAvailableTest extends EndpointTest {
    protected ?CreditorsNextAvailableEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): CreditorsNextAvailableEndpoint {
        return new CreditorsNextAvailableEndpoint($this->client, self::getLogger());
    }

    public function testGetCreditorsNextAvailable() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $nextAvailable = $this->endpoint->search();

        $this->assertNotNull($nextAvailable);
    }
}
