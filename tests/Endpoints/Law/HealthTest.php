<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HealthTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Law;

use Datev\API\Desktop\Endpoints\Law\HealthEndpoint;
use Datev\Entities\Law\Health\Health;
use Tests\Contracts\EndpointTest;

class HealthTest extends EndpointTest {
    protected HealthEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new HealthEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'status' => 'healthy',
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);
        $health = Health::fromJson($json);

        $this->assertInstanceOf(Health::class, $health);
        $this->assertEquals('healthy', $health->getStatus());
    }

    public function test_get_health(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $result = $this->endpoint->get();

        $this->assertInstanceOf(Health::class, $result);
        $this->assertNotEmpty($result->getStatus());
    }
}
