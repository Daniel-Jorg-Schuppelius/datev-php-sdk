<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ReasonsForAbsenceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\ReasonsForAbsenceEndpoint;
use Datev\Entities\Payroll\ReasonsForAbsence\{ReasonForAbsence, ReasonsForAbsence};
use Tests\Contracts\EndpointTest;

class ReasonsForAbsenceTest extends EndpointTest {
    protected ?ReasonsForAbsenceEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): ReasonsForAbsenceEndpoint {
        return new ReasonsForAbsenceEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => '12345',
            'reason' => 'Krankheit',
            'paid' => true,
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $reason = ReasonForAbsence::fromJson($json);
        $this->assertInstanceOf(ReasonForAbsence::class, $reason);
    }

    public function test_json_serialize_collection(): void {
        $data = [
            ['id' => '12345', 'reason' => 'Krankheit'],
            ['id' => '12346', 'reason' => 'Urlaub'],
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $reasons = ReasonsForAbsence::fromJson($json);
        $this->assertInstanceOf(ReasonsForAbsence::class, $reasons);
        $this->assertCount(2, $reasons->getValues());
    }

    public function test_get_reasons_for_absence(): void {
        $this->endpoint = $this->createEndpoint();
        $reasons = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($reasons);
    }
}
