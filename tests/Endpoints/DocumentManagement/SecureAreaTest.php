<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SecureAreaTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\DocumentManagement;

use Datev\API\Desktop\Endpoints\DocumentManagement\SecureAreasEndpoint;
use Datev\Entities\DocumentManagement\SecureAreas\SecureArea;
use Datev\Entities\DocumentManagement\SecureAreas\SecureAreas;
use Tests\Contracts\EndpointTest;

class SecureAreaTest extends EndpointTest {
    protected ?SecureAreasEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new SecureAreasEndpoint($this->client, $this->logger);
        $this->apiDisabled = true; // API is disabled
    }

    public function testGetSecureAreasAPI() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $secureAreas = $this->endpoint->search();
        $this->assertInstanceOf(SecureAreas::class, $secureAreas);
        $this->assertNotEmpty($secureAreas->getValues(), "No secureAreas found");
        $randomSecureArea = $secureAreas->getValues()[array_rand($secureAreas->getValues())];
        $this->assertInstanceOf(SecureArea::class, $randomSecureArea);
        $secureArea = $this->endpoint->get($randomSecureArea->getId());
        $this->assertInstanceOf(SecureArea::class, $secureArea);
        $this->assertEquals($randomSecureArea->getId(), $secureArea->getId());
    }
}
