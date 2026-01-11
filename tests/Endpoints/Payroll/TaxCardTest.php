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
use Datev\Entities\Payroll\Taxations\TaxCards\TaxCard;
use Datev\Entities\Payroll\Taxations\TaxCards\TaxCards;
use Tests\Contracts\EndpointTest;

class TaxCardTest extends EndpointTest {
    protected ?TaxCardEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): TaxCardEndpoint {
        return new TaxCardEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => '12345',
            'tax_id' => '12345678901',
            'tax_class' => 1
        ];

        $taxCard = TaxCard::fromJson(json_encode($data));
        $this->assertInstanceOf(TaxCard::class, $taxCard);
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['id' => '12345', 'tax_id' => '12345678901'],
            ['id' => '12346', 'tax_id' => '12345678902']
        ];

        $taxCards = TaxCards::fromJson(json_encode($data));
        $this->assertInstanceOf(TaxCards::class, $taxCards);
        $this->assertCount(2, $taxCards->getValues());
    }

    public function testGetTaxCards() {
        $this->endpoint = $this->createEndpoint();
        $taxCards = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($taxCards);
    }
}
