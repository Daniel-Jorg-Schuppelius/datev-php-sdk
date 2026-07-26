<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : NotificationsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\PublicSector;

use Datev\API\Desktop\Endpoints\PublicSector\NotificationsEndpoint;
use Tests\Contracts\EndpointTest;

class NotificationsTest extends EndpointTest {
    protected NotificationsEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new NotificationsEndpoint($this->client, self::getLogger());
    }

    public function test_get_notifications(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $notifications = $this->endpoint->search();
        $this->assertNotNull($notifications);
    }
}
