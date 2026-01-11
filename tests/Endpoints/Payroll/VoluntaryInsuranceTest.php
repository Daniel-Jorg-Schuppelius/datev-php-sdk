<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VoluntaryInsuranceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\VoluntaryInsuranceEndpoint;
use Datev\Entities\Payroll\Insurances\Voluntary\VoluntaryInsurance;
use Datev\Entities\Payroll\Insurances\Voluntary\VoluntaryInsurances;
use Tests\Contracts\EndpointTest;

class VoluntaryInsuranceTest extends EndpointTest {
    protected ?VoluntaryInsuranceEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): VoluntaryInsuranceEndpoint {
        return new VoluntaryInsuranceEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => '12345',
            'insurance_type' => 'Zusatzversicherung',
            'monthly_contribution' => 100.00
        ];

        $insurance = VoluntaryInsurance::fromJson(json_encode($data));
        $this->assertInstanceOf(VoluntaryInsurance::class, $insurance);
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['id' => '12345', 'insurance_type' => 'Zusatzversicherung'],
            ['id' => '12346', 'insurance_type' => 'Betriebsrente']
        ];

        $insurances = VoluntaryInsurances::fromJson(json_encode($data));
        $this->assertInstanceOf(VoluntaryInsurances::class, $insurances);
        $this->assertCount(2, $insurances->getValues());
    }

    public function testGetVoluntaryInsurances() {
        $this->endpoint = $this->createEndpoint();
        $insurances = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($insurances);
    }
}
