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
use Datev\Entities\Payroll\CostCenters\CostCenter;
use Datev\Entities\Payroll\CostCenters\CostCenters;
use Tests\Contracts\EndpointTest;

class CostCentersTest extends EndpointTest {
    protected ?CostCentersEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): CostCentersEndpoint {
        return new CostCentersEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => 'CC001',
            'name' => 'Kostenstelle Vertrieb'
        ];

        $costCenter = CostCenter::fromJson(json_encode($data));
        $this->assertInstanceOf(CostCenter::class, $costCenter);
        $this->assertEquals('Kostenstelle Vertrieb', $costCenter->getName());
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['id' => 'CC001', 'name' => 'Vertrieb'],
            ['id' => 'CC002', 'name' => 'Entwicklung']
        ];

        $costCenters = CostCenters::fromJson(json_encode($data));
        $this->assertInstanceOf(CostCenters::class, $costCenters);
        $this->assertCount(2, $costCenters->getValues());
    }

    public function testGetCostCenters() {
        $this->endpoint = $this->createEndpoint();
        $costCenters = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($costCenters);
    }
}
