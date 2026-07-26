<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : InternalCostServicesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Accounting;

use Datev\API\Desktop\Endpoints\Accounting\InternalCostServicesEndpoint;
use Tests\Contracts\EndpointTest;

class InternalCostServicesTest extends EndpointTest {
    protected ?InternalCostServicesEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): InternalCostServicesEndpoint {
        return new InternalCostServicesEndpoint($this->client, self::getLogger());
    }

    public function test_get_internal_cost_services(): void {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $services = $this->endpoint->get();

        $this->assertNotNull($services);
    }
}
