<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VacationEntitlementTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\VacationEntitlementEndpoint;
use Datev\Entities\Payroll\VacationEntitlements\{VacationEntitlement, VacationEntitlements};
use Tests\Contracts\EndpointTest;

class VacationEntitlementTest extends EndpointTest {
    protected ?VacationEntitlementEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): VacationEntitlementEndpoint {
        return new VacationEntitlementEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => '12345',
            'annual_entitlement' => 30,
            'remaining_days' => 15,
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $entitlement = VacationEntitlement::fromJson($json);
        $this->assertInstanceOf(VacationEntitlement::class, $entitlement);
    }

    public function test_json_serialize_collection(): void {
        $data = [
            ['id' => '12345', 'annual_entitlement' => 30],
            ['id' => '12346', 'annual_entitlement' => 28],
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $entitlements = VacationEntitlements::fromJson($json);
        $this->assertInstanceOf(VacationEntitlements::class, $entitlements);
        $this->assertCount(2, $entitlements->getValues());
    }

    public function test_get_vacation_entitlements(): void {
        $this->endpoint = $this->createEndpoint();
        $entitlements = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($entitlements);
    }
}
