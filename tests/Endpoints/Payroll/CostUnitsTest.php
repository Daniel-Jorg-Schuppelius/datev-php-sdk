<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostUnitsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\CostUnitsEndpoint;
use Datev\Entities\Payroll\CostUnits\CostUnit;
use Datev\Entities\Payroll\CostUnits\CostUnits;
use Tests\Contracts\EndpointTest;

class CostUnitsTest extends EndpointTest {
    protected ?CostUnitsEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): CostUnitsEndpoint {
        return new CostUnitsEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => 'CU001',
            'name' => 'Kostenträger Projekt A'
        ];

        $costUnit = CostUnit::fromJson(json_encode($data));
        $this->assertInstanceOf(CostUnit::class, $costUnit);
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['id' => 'CU001', 'name' => 'Projekt A'],
            ['id' => 'CU002', 'name' => 'Projekt B']
        ];

        $costUnits = CostUnits::fromJson(json_encode($data));
        $this->assertInstanceOf(CostUnits::class, $costUnits);
        $this->assertCount(2, $costUnits->getValues());
    }

    public function testGetCostUnits() {
        $this->endpoint = $this->createEndpoint();
        $costUnits = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($costUnits);
    }
}
