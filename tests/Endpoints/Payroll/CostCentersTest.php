<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCentersTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\CostCentersEndpoint;
use Datev\Entities\Payroll\CostCenters\{CostCenter, CostCenters};
use Tests\Contracts\EndpointTest;

class CostCentersTest extends EndpointTest {
    protected ?CostCentersEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): CostCentersEndpoint {
        return new CostCentersEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => 'CC001',
            'name' => 'Kostenstelle Vertrieb',
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);
        $costCenter = CostCenter::fromJson($json);
        $this->assertInstanceOf(CostCenter::class, $costCenter);
        $this->assertEquals('Kostenstelle Vertrieb', $costCenter->getName());
    }

    public function test_json_serialize_collection(): void {
        $data = [
            ['id' => 'CC001', 'name' => 'Vertrieb'],
            ['id' => 'CC002', 'name' => 'Entwicklung'],
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);
        $costCenters = CostCenters::fromJson($json);
        $this->assertInstanceOf(CostCenters::class, $costCenters);
        $this->assertCount(2, $costCenters->getValues());
    }

    public function test_get_cost_centers(): void {
        $this->endpoint = $this->createEndpoint();
        $costCenters = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($costCenters);
    }
}
