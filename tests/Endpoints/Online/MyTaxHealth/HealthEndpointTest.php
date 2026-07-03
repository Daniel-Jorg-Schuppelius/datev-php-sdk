<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HealthEndpointTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Online\MyTaxHealth;

use Datev\API\Online\Endpoints\MyTaxHealth\HealthEndpoint;
use Datev\API\Online\OnlineService;
use Datev\Entities\Online\Common\Health\Health;
use Tests\Contracts\OnlineEndpointTest;

class HealthEndpointTest extends OnlineEndpointTest {
    protected function getService(): OnlineService {
        return OnlineService::MyTaxHealth;
    }

    public function test_get_health(): void {
        $this->registerMockResponse('GET', 'actuator/health', 200, ['status' => 'UP']);

        $endpoint = new HealthEndpoint($this->client);
        $health = $endpoint->get();

        $this->assertInstanceOf(Health::class, $health);

        if ($this->isUsingMock()) {
            $this->assertTrue($health->isUp());
        }
    }
}
