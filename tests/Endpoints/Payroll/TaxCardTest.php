<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TaxCardTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\TaxCardEndpoint;
use Datev\Entities\Payroll\Taxations\TaxCards\{TaxCard, TaxCards};
use Tests\Contracts\EndpointTest;

class TaxCardTest extends EndpointTest {
    protected ?TaxCardEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): TaxCardEndpoint {
        return new TaxCardEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => '12345',
            'tax_id' => '12345678901',
            'tax_class' => 1,
        ];

        $json = json_encode($data);
        $this->assertIsString($json);

        $taxCard = TaxCard::fromJson($json);
        $this->assertInstanceOf(TaxCard::class, $taxCard);
    }

    public function test_json_serialize_collection(): void {
        $data = [
            ['id' => '12345', 'tax_id' => '12345678901'],
            ['id' => '12346', 'tax_id' => '12345678902'],
        ];

        $json = json_encode($data);
        $this->assertIsString($json);

        $taxCards = TaxCards::fromJson($json);
        $this->assertInstanceOf(TaxCards::class, $taxCards);
        $this->assertCount(2, $taxCards->getValues());
    }

    public function test_get_tax_cards(): void {
        $this->endpoint = $this->createEndpoint();
        $taxCards = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($taxCards);
    }
}
