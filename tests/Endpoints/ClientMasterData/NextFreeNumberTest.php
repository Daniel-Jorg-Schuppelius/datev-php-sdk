<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : NextFreeNumberTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\NextFreeNumberEndpoint;
use Tests\Contracts\EndpointTest;

class NextFreeNumberTest extends EndpointTest {
    protected ?NextFreeNumberEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new NextFreeNumberEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetNextFreeNumber() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $nextNumber = $this->endpoint->search();
        $this->assertNotNull($nextNumber);
    }
}
