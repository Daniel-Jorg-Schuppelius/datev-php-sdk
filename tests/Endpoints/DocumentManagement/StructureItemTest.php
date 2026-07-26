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

use Datev\API\Desktop\Endpoints\DocumentManagement\{DocumentsEndpoint, StructureItemsEndpoint};
use Datev\Entities\DocumentManagement\StructureItems\{StructureItem, StructureItems};
use Tests\Contracts\EndpointTest;

class StructureItemTest extends EndpointTest {
    protected DocumentsEndpoint $preEndpoint;
    protected StructureItemsEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true; // API is disabled
        parent::setUp();
        $this->preEndpoint = new DocumentsEndpoint($this->client, self::getLogger());
        $this->endpoint = new StructureItemsEndpoint($this->client, self::getLogger());
    }

    public function test_get_secure_areas_api(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $documents = $this->preEndpoint->search();
        $this->assertNotNull($documents);
        $randomDocument = $documents->getValues()[array_rand($documents->getValues())];
        $documentID = $randomDocument->getID();
        $this->assertNotNull($documentID);
        $this->endpoint->setDocumentID($documentID);

        $structureItems = $this->endpoint->search();
        $this->assertInstanceOf(StructureItems::class, $structureItems);
        $this->assertNotEmpty($structureItems->getValues(), "No structureItems found");
        $randomStructureItem = $structureItems->getValues()[array_rand($structureItems->getValues())];
        $this->assertInstanceOf(StructureItem::class, $randomStructureItem);
        $structureItem = $this->endpoint->get($randomStructureItem->getID());
        $this->assertInstanceOf(StructureItem::class, $structureItem);
        $this->assertEquals($randomStructureItem->getID(), $structureItem->getID());
    }
}
