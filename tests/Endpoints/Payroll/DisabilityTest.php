<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DisabilityTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\DisabilityEndpoint;
use Datev\Entities\Payroll\Disabilities\Disability;
use Datev\Entities\Payroll\Disabilities\Disabilities;
use Tests\Contracts\EndpointTest;

class DisabilityTest extends EndpointTest {
    protected ?DisabilityEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): DisabilityEndpoint {
        return new DisabilityEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => '12345',
            'degree_of_disability' => 50,
            'valid_from' => '2024-01-01'
        ];

        $disability = Disability::fromJson(json_encode($data));
        $this->assertInstanceOf(Disability::class, $disability);
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['id' => '12345', 'degree_of_disability' => 50],
            ['id' => '12346', 'degree_of_disability' => 30]
        ];

        $disabilities = Disabilities::fromJson(json_encode($data));
        $this->assertInstanceOf(Disabilities::class, $disabilities);
        $this->assertCount(2, $disabilities->getValues());
    }

    public function testGetDisabilities() {
        $this->endpoint = $this->createEndpoint();
        $disabilities = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($disabilities);
    }
}
