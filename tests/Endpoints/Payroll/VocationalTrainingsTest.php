<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VocationalTrainingsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\VocationalTrainingsEndpoint;
use Datev\Entities\Payroll\VocationalTrainings\VocationalTraining;
use Datev\Entities\Payroll\VocationalTrainings\VocationalTrainings;
use Tests\Contracts\EndpointTest;

class VocationalTrainingsTest extends EndpointTest {
    protected ?VocationalTrainingsEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): VocationalTrainingsEndpoint {
        return new VocationalTrainingsEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => '12345',
            'training_type' => 'Ausbildung',
            'start_date' => '2024-01-01'
        ];

        $training = VocationalTraining::fromJson(json_encode($data));
        $this->assertInstanceOf(VocationalTraining::class, $training);
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['id' => '12345', 'training_type' => 'Ausbildung'],
            ['id' => '12346', 'training_type' => 'Weiterbildung']
        ];

        $trainings = VocationalTrainings::fromJson(json_encode($data));
        $this->assertInstanceOf(VocationalTrainings::class, $trainings);
        $this->assertCount(2, $trainings->getValues());
    }

    public function testGetVocationalTrainings() {
        $this->endpoint = $this->createEndpoint();
        $trainings = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($trainings);
    }
}
