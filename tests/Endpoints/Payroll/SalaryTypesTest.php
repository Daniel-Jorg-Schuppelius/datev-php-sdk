<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SalaryTypesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\SalaryTypesEndpoint;
use Datev\Entities\Payroll\Salaries\SalaryTypes\{SalaryType, SalaryTypes};
use Tests\Contracts\EndpointTest;

class SalaryTypesTest extends EndpointTest {
    protected ?SalaryTypesEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): SalaryTypesEndpoint {
        return new SalaryTypesEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => 'ST001',
            'name' => 'Grundgehalt',
            'description' => 'Monatliches Grundgehalt',
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $salaryType = SalaryType::fromJson($json);
        $this->assertInstanceOf(SalaryType::class, $salaryType);
    }

    public function test_json_serialize_collection(): void {
        $data = [
            ['id' => 'ST001', 'name' => 'Grundgehalt'],
            ['id' => 'ST002', 'name' => 'Bonus'],
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $salaryTypes = SalaryTypes::fromJson($json);
        $this->assertInstanceOf(SalaryTypes::class, $salaryTypes);
        $this->assertCount(2, $salaryTypes->getValues());
    }

    public function test_get_salary_types(): void {
        $this->endpoint = $this->createEndpoint();
        $salaryTypes = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($salaryTypes);
    }
}
