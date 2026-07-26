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
use Datev\Entities\Payroll\Taxations\{Taxation, Taxations};
use Tests\Contracts\EndpointTest;

class TaxationTest extends EndpointTest {
    protected ?TaxationEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): TaxationEndpoint {
        return new TaxationEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => '12345',
            'tax_class' => 1,
            'church_tax' => true,
        ];

        $json = json_encode($data);
        $this->assertIsString($json);
        $taxation = Taxation::fromJson($json);
        $this->assertInstanceOf(Taxation::class, $taxation);
    }

    public function test_json_serialize_collection(): void {
        $data = [
            ['id' => '12345', 'tax_class' => 1],
            ['id' => '12346', 'tax_class' => 3],
        ];

        $json = json_encode($data);
        $this->assertIsString($json);
        $taxations = Taxations::fromJson($json);
        $this->assertInstanceOf(Taxations::class, $taxations);
        $this->assertCount(2, $taxations->getValues());
    }

    public function test_get_taxations(): void {
        $this->endpoint = $this->createEndpoint();
        $taxations = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($taxations);
    }
}
