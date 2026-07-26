<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExpenseTypesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Law;

use Datev\API\Desktop\Endpoints\Law\ExpenseTypesEndpoint;
use Datev\Entities\Law\ExpenseTypes\{ExpenseType, ExpenseTypes};
use Tests\Contracts\EndpointTest;

class ExpenseTypesTest extends EndpointTest {
    protected ExpenseTypesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new ExpenseTypesEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => '550e8400-e29b-41d4-a716-446655440000',
            'name' => 'Kopien',
            'number' => 7000,
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $expenseType = ExpenseType::fromJson($json);

        $this->assertInstanceOf(ExpenseType::class, $expenseType);
        $id = $expenseType->getID();
        $this->assertNotNull($id);
        $this->assertEquals('550e8400-e29b-41d4-a716-446655440000', $id->toString());
        $this->assertEquals('Kopien', $expenseType->getName());
        $this->assertEquals(7000, $expenseType->getNumber());
    }

    public function test_json_serialize_collection(): void {
        $data = [
            [
                'id' => '550e8400-e29b-41d4-a716-446655440000',
                'name' => 'Kopien',
                'number' => 7000,
            ],
            [
                'id' => '550e8400-e29b-41d4-a716-446655440001',
                'name' => 'Porto',
                'number' => 7001,
            ],
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $expenseTypes = ExpenseTypes::fromJson($json);

        $this->assertInstanceOf(ExpenseTypes::class, $expenseTypes);
        $this->assertCount(2, $expenseTypes->getValues());
    }

    public function test_search_expense_types(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $result = $this->endpoint->search();

        $this->assertInstanceOf(ExpenseTypes::class, $result);
    }
}
