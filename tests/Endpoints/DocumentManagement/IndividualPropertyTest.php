<?php

namespace Tests\Endpoints\DocumentManagement;

use Datev\API\Desktop\Endpoints\DocumentManagement\IndividualPropertiesEndpoint;
use Datev\Entities\DocumentManagement\IndividualProperties\IndividualProperties;
use Datev\Entities\DocumentManagement\IndividualProperties\IndividualProperty;
use Tests\Contracts\EndpointTest;

class IndividualPropertyTest extends EndpointTest {
    protected ?IndividualPropertiesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new IndividualPropertiesEndpoint($this->client, $this->logger);
        $this->apiDisabled = true; // API is disabled
    }

    public function testCreateAndDeleteArticleAPI() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $individualProperties = $this->endpoint->get();
        $this->assertInstanceOf(IndividualProperties::class, $individualProperties);
        $this->assertNotEmpty($individualProperties->getValues(), "No individualProperties found");
        $randomIndividualProperty = $individualProperties->getValues()[array_rand($individualProperties->getValues())];
        $this->assertInstanceOf(IndividualProperty::class, $randomIndividualProperty);
    }
}
