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
    protected ?HealthEndpoint $endpoint;

    public function __construct($name = null) {
        parent::__construct($name);
        $this->endpoint = new HealthEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testJsonSerialize() {
        $data = [
            'status' => 'healthy'
        ];

        $health = Health::fromJson(json_encode($data));

        $this->assertInstanceOf(Health::class, $health);
        $this->assertEquals('healthy', $health->getStatus());
    }

    public function testGetHealth() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $result = $this->endpoint->get();

        $this->assertInstanceOf(Health::class, $result);
        $this->assertNotEmpty($result->getStatus());
    }
}
