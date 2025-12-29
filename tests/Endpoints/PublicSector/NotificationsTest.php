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
    protected ?NotificationsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new NotificationsEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetNotifications() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $notifications = $this->endpoint->search();
        $this->assertNotNull($notifications);
    }
}
