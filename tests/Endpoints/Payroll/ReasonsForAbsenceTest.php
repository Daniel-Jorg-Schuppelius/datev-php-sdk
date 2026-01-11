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
use Datev\Entities\Payroll\ReasonsForAbsence\ReasonForAbsence;
use Datev\Entities\Payroll\ReasonsForAbsence\ReasonsForAbsence;
use Tests\Contracts\EndpointTest;

class ReasonsForAbsenceTest extends EndpointTest {
    protected ?ReasonsForAbsenceEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): ReasonsForAbsenceEndpoint {
        return new ReasonsForAbsenceEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => '12345',
            'reason' => 'Krankheit',
            'paid' => true
        ];

        $reason = ReasonForAbsence::fromJson(json_encode($data));
        $this->assertInstanceOf(ReasonForAbsence::class, $reason);
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['id' => '12345', 'reason' => 'Krankheit'],
            ['id' => '12346', 'reason' => 'Urlaub']
        ];

        $reasons = ReasonsForAbsence::fromJson(json_encode($data));
        $this->assertInstanceOf(ReasonsForAbsence::class, $reasons);
        $this->assertCount(2, $reasons->getValues());
    }

    public function testGetReasonsForAbsence() {
        $this->endpoint = $this->createEndpoint();
        $reasons = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($reasons);
    }
}
