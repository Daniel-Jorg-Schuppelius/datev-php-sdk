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
use Datev\Entities\Law\ExpenseTypes\ExpenseType;
use Datev\Entities\Law\ExpenseTypes\ExpenseTypes;
use Tests\Contracts\EndpointTest;

class ExpenseTypesTest extends EndpointTest {
    protected ?ExpenseTypesEndpoint $endpoint;

    public function __construct($name = null) {
        parent::__construct($name);
        $this->endpoint = new ExpenseTypesEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testJsonSerialize() {
        $data = [
            'id' => '550e8400-e29b-41d4-a716-446655440000',
            'name' => 'Kopien',
            'number' => 7000
        ];

        $expenseType = ExpenseType::fromJson(json_encode($data));

        $this->assertInstanceOf(ExpenseType::class, $expenseType);
        $this->assertEquals('550e8400-e29b-41d4-a716-446655440000', $expenseType->getID()->toString());
        $this->assertEquals('Kopien', $expenseType->getName());
        $this->assertEquals(7000, $expenseType->getNumber());
    }

    public function testJsonSerializeCollection() {
        $data = [
            [
                'id' => '550e8400-e29b-41d4-a716-446655440000',
                'name' => 'Kopien',
                'number' => 7000
            ],
            [
                'id' => '550e8400-e29b-41d4-a716-446655440001',
                'name' => 'Porto',
                'number' => 7001
            ]
        ];

        $expenseTypes = ExpenseTypes::fromJson(json_encode($data));

        $this->assertInstanceOf(ExpenseTypes::class, $expenseTypes);
        $this->assertCount(2, $expenseTypes->getValues());
    }

    public function testSearchExpenseTypes() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $result = $this->endpoint->search();

        $this->assertInstanceOf(ExpenseTypes::class, $result);
    }
}
