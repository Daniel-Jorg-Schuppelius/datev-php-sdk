<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AssetsStocktakingsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Accounting;

use Datev\API\Desktop\Endpoints\Accounting\AssetsStocktakingsEndpoint;
use Tests\Contracts\EndpointTest;

class AssetsStocktakingsTest extends EndpointTest {
    protected ?AssetsStocktakingsEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): AssetsStocktakingsEndpoint {
        return new AssetsStocktakingsEndpoint($this->client, self::getLogger());
    }

    public function testGetAssetsStocktakings() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $stocktakings = $this->endpoint->search();

        $this->assertNotNull($stocktakings);
    }
}
