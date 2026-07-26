<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FinancialAccountingTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\FinancialAccountingEndpoint;
use Datev\Entities\Payroll\FinancialAccountings\{FinancialAccounting, FinancialAccountings};
use Tests\Contracts\EndpointTest;

class FinancialAccountingTest extends EndpointTest {
    protected ?FinancialAccountingEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): FinancialAccountingEndpoint {
        return new FinancialAccountingEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => '12345',
            'account_number' => '4000',
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $accounting = FinancialAccounting::fromJson($json);
        $this->assertInstanceOf(FinancialAccounting::class, $accounting);
    }

    public function test_json_serialize_collection(): void {
        $data = [
            ['id' => '12345', 'account_number' => '4000'],
            ['id' => '12346', 'account_number' => '4100'],
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $accountings = FinancialAccountings::fromJson($json);
        $this->assertInstanceOf(FinancialAccountings::class, $accountings);
        $this->assertCount(2, $accountings->getValues());
    }

    public function test_get_financial_accountings(): void {
        $this->endpoint = $this->createEndpoint();
        $accountings = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($accountings);
    }
}
