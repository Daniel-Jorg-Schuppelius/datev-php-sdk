<?php

namespace Tests\Endpoints\DocumentManagement;

use Datev\API\Desktop\Endpoints\DocumentManagement\PropertyTemplatesEndpoint;
use Datev\Entities\DocumentManagement\PropertyTemplates\PropertyTemplate;
use Datev\Entities\DocumentManagement\PropertyTemplates\PropertyTemplates;
use Tests\Contracts\EndpointTest;

class PropertyTemplateTest extends EndpointTest {
    protected ?PropertyTemplatesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new PropertyTemplatesEndpoint($this->client, $this->logger);
        $this->apiDisabled = true; // API is disabled
    }

    public function testCreateAndDeleteArticleAPI() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $propertyTemplates = $this->endpoint->search();
        $this->assertInstanceOf(PropertyTemplates::class, $propertyTemplates);
        $this->assertNotEmpty($propertyTemplates->getValues(), "No propertyTemplates found");
        $randomPropertyTemplate = $propertyTemplates->getValues()[array_rand($propertyTemplates->getValues())];
        $this->assertInstanceOf(PropertyTemplate::class, $randomPropertyTemplate);
        $propertyTemplate = $this->endpoint->get($randomPropertyTemplate->getId());
        $this->assertInstanceOf(PropertyTemplate::class, $propertyTemplate);
        $this->assertEquals($randomPropertyTemplate, $propertyTemplate);
    }
}
