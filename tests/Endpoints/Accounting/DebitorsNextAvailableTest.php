<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DebitorsNextAvailableTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Accounting;

use Datev\API\Desktop\Endpoints\Accounting\DebitorsNextAvailableEndpoint;
use Tests\Contracts\EndpointTest;

class DebitorsNextAvailableTest extends EndpointTest {
    protected ?DebitorsNextAvailableEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): DebitorsNextAvailableEndpoint {
        return new DebitorsNextAvailableEndpoint($this->client, self::getLogger());
    }

    public function testGetDebitorsNextAvailable() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $nextAvailable = $this->endpoint->search();

        $this->assertNotNull($nextAvailable);
    }
}
