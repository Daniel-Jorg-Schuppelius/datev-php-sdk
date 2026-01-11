<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SocialInsuranceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\SocialInsuranceEndpoint;
use Datev\Entities\Payroll\Insurances\Social\SocialInsurance;
use Datev\Entities\Payroll\Insurances\Social\SocialInsurances;
use Tests\Contracts\EndpointTest;

class SocialInsuranceTest extends EndpointTest {
    protected ?SocialInsuranceEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): SocialInsuranceEndpoint {
        return new SocialInsuranceEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => '12345',
            'insurance_number' => '12345678A',
            'insurance_type' => 'Gesetzlich'
        ];

        $insurance = SocialInsurance::fromJson(json_encode($data));
        $this->assertInstanceOf(SocialInsurance::class, $insurance);
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['id' => '12345', 'insurance_number' => '12345678A'],
            ['id' => '12346', 'insurance_number' => '12345679B']
        ];

        $insurances = SocialInsurances::fromJson(json_encode($data));
        $this->assertInstanceOf(SocialInsurances::class, $insurances);
        $this->assertCount(2, $insurances->getValues());
    }

    public function testGetSocialInsurances() {
        $this->endpoint = $this->createEndpoint();
        $insurances = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($insurances);
    }
}
