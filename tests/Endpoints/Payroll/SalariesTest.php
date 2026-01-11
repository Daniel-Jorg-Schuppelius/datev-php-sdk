<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SalariesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\SalariesEndpoint;
use Datev\Entities\Payroll\Salaries\Salary;
use Datev\Entities\Payroll\Salaries\Salaries;
use Tests\Contracts\EndpointTest;

class SalariesTest extends EndpointTest {
    protected ?SalariesEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): SalariesEndpoint {
        return new SalariesEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => '12345',
            'amount' => 4500.00,
            'currency' => 'EUR'
        ];

        $salary = Salary::fromJson(json_encode($data));
        $this->assertInstanceOf(Salary::class, $salary);
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['id' => '12345', 'amount' => 4500.00],
            ['id' => '12346', 'amount' => 5000.00]
        ];

        $salaries = Salaries::fromJson(json_encode($data));
        $this->assertInstanceOf(Salaries::class, $salaries);
        $this->assertCount(2, $salaries->getValues());
    }

    public function testGetSalaries() {
        $this->endpoint = $this->createEndpoint();
        $salaries = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($salaries);
    }
}
