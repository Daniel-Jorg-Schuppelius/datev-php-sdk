<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : IndividualReference1Test.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\DocumentManagement;

use Datev\API\Desktop\Endpoints\DocumentManagement\IndividualReferences1Endpoint;
use Datev\Entities\DocumentManagement\IndividualReferences\{IndividualReference, IndividualReferences};
use Tests\Contracts\EndpointTest;

class IndividualReference1Test extends EndpointTest {
    protected IndividualReferences1Endpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new IndividualReferences1Endpoint($this->client, self::getLogger());
    }

    public function test_get_individual_references_api(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $individualReferences = $this->endpoint->search(["top" => 2, "skip" => 0]);
        $this->assertInstanceOf(IndividualReferences::class, $individualReferences);
        $this->assertNotEmpty($individualReferences->getValues(), "No individualReferences1 found");
        $randomIndividualReference = $individualReferences->getValues()[array_rand($individualReferences->getValues())];
        $this->assertInstanceOf(IndividualReference::class, $randomIndividualReference);
    }
}
