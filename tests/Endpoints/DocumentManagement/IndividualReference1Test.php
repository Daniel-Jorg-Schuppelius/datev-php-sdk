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
use Datev\Entities\DocumentManagement\IndividualReferences\IndividualReference;
use Datev\Entities\DocumentManagement\IndividualReferences\IndividualReferences;
use Tests\Contracts\EndpointTest;

class IndividualReference1Test extends EndpointTest {
    protected ?IndividualReferences1Endpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new IndividualReferences1Endpoint($this->client, self::getLogger());
        $this->apiDisabled = true; // API is disabled
    }

    public function testGetIndividualReferencesAPI() {
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
