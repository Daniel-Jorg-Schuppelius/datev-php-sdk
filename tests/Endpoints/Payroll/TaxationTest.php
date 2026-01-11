<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TaxationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\TaxationEndpoint;
use Datev\Entities\Payroll\Taxations\Taxation;
use Datev\Entities\Payroll\Taxations\Taxations;
use Tests\Contracts\EndpointTest;

class TaxationTest extends EndpointTest {
    protected ?TaxationEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): TaxationEndpoint {
        return new TaxationEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => '12345',
            'tax_class' => 1,
            'church_tax' => true
        ];

        $taxation = Taxation::fromJson(json_encode($data));
        $this->assertInstanceOf(Taxation::class, $taxation);
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['id' => '12345', 'tax_class' => 1],
            ['id' => '12346', 'tax_class' => 3]
        ];

        $taxations = Taxations::fromJson(json_encode($data));
        $this->assertInstanceOf(Taxations::class, $taxations);
        $this->assertCount(2, $taxations->getValues());
    }

    public function testGetTaxations() {
        $this->endpoint = $this->createEndpoint();
        $taxations = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($taxations);
    }
}
