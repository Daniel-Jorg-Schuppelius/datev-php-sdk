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
use Datev\Entities\Payroll\Insurances\Voluntary\{VoluntaryInsurance, VoluntaryInsurances};
use Tests\Contracts\EndpointTest;

class VoluntaryInsuranceTest extends EndpointTest {
    protected ?VoluntaryInsuranceEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): VoluntaryInsuranceEndpoint {
        return new VoluntaryInsuranceEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => '12345',
            'insurance_type' => 'Zusatzversicherung',
            'monthly_contribution' => 100.00,
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $insurance = VoluntaryInsurance::fromJson($json);
        $this->assertInstanceOf(VoluntaryInsurance::class, $insurance);
    }

    public function test_json_serialize_collection(): void {
        $data = [
            ['id' => '12345', 'insurance_type' => 'Zusatzversicherung'],
            ['id' => '12346', 'insurance_type' => 'Betriebsrente'],
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $insurances = VoluntaryInsurances::fromJson($json);
        $this->assertInstanceOf(VoluntaryInsurances::class, $insurances);
        $this->assertCount(2, $insurances->getValues());
    }

    public function test_get_voluntary_insurances(): void {
        $this->endpoint = $this->createEndpoint();
        $insurances = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($insurances);
    }
}
