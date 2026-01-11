<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CorporateStructuresTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\CorporateStructuresEndpoint;
use Tests\Contracts\EndpointTest;

class CorporateStructuresTest extends EndpointTest {
    protected ?CorporateStructuresEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new CorporateStructuresEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetCorporateStructures() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $structures = $this->endpoint->search();
        $this->assertNotNull($structures);
    }
}
