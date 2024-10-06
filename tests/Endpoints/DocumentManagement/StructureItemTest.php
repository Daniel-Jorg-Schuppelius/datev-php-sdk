<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : StructureItemTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\DocumentManagement;

use Datev\API\Desktop\Endpoints\DocumentManagement\DocumentsEndpoint;
use Datev\API\Desktop\Endpoints\DocumentManagement\StructureItemsEndpoint;
use Datev\Entities\DocumentManagement\StructureItems\StructureItem;
use Datev\Entities\DocumentManagement\StructureItems\StructureItems;
use Tests\Contracts\EndpointTest;

class StructureItemTest extends EndpointTest {
    protected ?DocumentsEndpoint $preEndpoint;
    protected ?StructureItemsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->preEndpoint = new DocumentsEndpoint($this->client, $this->logger);
        $this->endpoint = new StructureItemsEndpoint($this->client, $this->logger);
        $this->apiDisabled = true; // API is disabled
    }

    public function testGetSecureAreasAPI() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $documents = $this->preEndpoint->search();
        $randomDocument = $documents->getValues()[array_rand($documents->getValues())];
        $this->endpoint->setDocumentID($randomDocument->getId());

        $structureItems = $this->endpoint->search();
        $this->assertInstanceOf(StructureItems::class, $structureItems);
        $this->assertNotEmpty($structureItems->getValues(), "No structureItems found");
        $randomStructureItem = $structureItems->getValues()[array_rand($structureItems->getValues())];
        $this->assertInstanceOf(StructureItem::class, $randomStructureItem);
        $structureItem = $this->endpoint->get($randomStructureItem->getId());
        $this->assertInstanceOf(StructureItem::class, $structureItem);
        $this->assertEquals($randomStructureItem->getId(), $structureItem->getId());
    }
}
