<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCenterPropertiesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Accounting;

use Datev\API\Desktop\Endpoints\Accounting\CostCenterPropertiesEndpoint;
use Tests\Contracts\EndpointTest;

class CostCenterPropertiesTest extends EndpointTest {
    protected ?CostCenterPropertiesEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): CostCenterPropertiesEndpoint {
        return new CostCenterPropertiesEndpoint($this->client, self::getLogger());
    }

    public function testGetCostCenterProperties() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $properties = $this->endpoint->search();

        $this->assertNotNull($properties);
    }
}
