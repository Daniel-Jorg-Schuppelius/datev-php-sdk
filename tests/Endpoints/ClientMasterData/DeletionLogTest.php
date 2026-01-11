<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DeletionLogTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\DeletionLogEndpoint;
use Tests\Contracts\EndpointTest;

class DeletionLogTest extends EndpointTest {
    protected ?DeletionLogEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new DeletionLogEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetDeletionLog() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $log = $this->endpoint->search();
        $this->assertNotNull($log);
    }
}
