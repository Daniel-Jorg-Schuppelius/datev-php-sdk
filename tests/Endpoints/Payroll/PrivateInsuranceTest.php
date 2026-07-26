<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PrivateInsuranceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\PrivateInsuranceEndpoint;
use Datev\Entities\Payroll\Insurances\Private\{PrivateInsurance, PrivateInsurances};
use Tests\Contracts\EndpointTest;

class PrivateInsuranceTest extends EndpointTest {
    protected ?PrivateInsuranceEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): PrivateInsuranceEndpoint {
        return new PrivateInsuranceEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => '12345',
            'insurance_type' => 'Krankenversicherung',
            'monthly_contribution' => 500.00,
        ];

        $json = json_encode($data);
        $this->assertIsString($json);

        $insurance = PrivateInsurance::fromJson($json);
        $this->assertInstanceOf(PrivateInsurance::class, $insurance);
    }

    public function test_json_serialize_collection(): void {
        $data = [
            ['id' => '12345', 'insurance_type' => 'Krankenversicherung'],
            ['id' => '12346', 'insurance_type' => 'Pflegeversicherung'],
        ];

        $json = json_encode($data);
        $this->assertIsString($json);

        $insurances = PrivateInsurances::fromJson($json);
        $this->assertInstanceOf(PrivateInsurances::class, $insurances);
        $this->assertCount(2, $insurances->getValues());
    }

    public function test_get_private_insurances(): void {
        $this->endpoint = $this->createEndpoint();
        $insurances = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($insurances);
    }
}
