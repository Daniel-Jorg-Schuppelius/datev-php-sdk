<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : StructureItemsOfflineTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\DocumentManagement;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\DocumentManagement\StructureItemsEndpoint;
use Datev\Entities\DocumentManagement\Documents\DocumentID;
use Datev\Entities\DocumentManagement\StructureItems\{StructureItem, StructureItems};
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use Tests\Mocks\MockClient;

/**
 * Die Strukturelemente fragten /documents/{id} statt /documents/{id}/structure-items
 * ab, und document_file_id kam ohne Getter und verschachtelt aus toArray().
 */
final class StructureItemsOfflineTest extends TestCase {
    private const DOCUMENT = '96e01d5b-952d-4c1f-a634-76bebcc7ee99';
    private const BASE = '/datev/api/dms/v2/documents/' . self::DOCUMENT . '/structure-items';

    /**
     * @return array<string, mixed>
     */
    private function item(): array {
        return [
            'id' => 1,
            'name' => 'Rechnung.pdf',
            'counter' => 1,
            'type' => 2,
            'parent_counter' => 0,
            'document_file_id' => 1489,
            'creation_date' => '2021-01-04T11:37:40+01:00',
            'last_modification_date' => '2021-01-04T11:37:40+01:00',
        ];
    }

    private function endpoint(MockClient $client): StructureItemsEndpoint {
        $endpoint = new StructureItemsEndpoint($client, new NullLogger);
        $endpoint->setDocumentID(new DocumentID(self::DOCUMENT));

        return $endpoint;
    }

    public function test_search_reads_the_structure_items_with_their_file(): void {
        $client = new MockClient;
        $client->registerMockResponse('GET', self::BASE, 200, [$this->item()]);

        $items = $this->endpoint($client)->search();

        $this->assertInstanceOf(StructureItems::class, $items);
        $item = $items->getValues()[0];
        $this->assertInstanceOf(StructureItem::class, $item);
        $this->assertSame(1489, $item->getDocumentFileID()?->getValue());
        $this->assertSame(1489, $item->toArray()['document_file_id']);
    }

    public function test_get_reads_one_structure_item(): void {
        $client = new MockClient;
        $client->registerMockResponse('GET', self::BASE . '/1', 200, $this->item());

        $item = $this->endpoint($client)->get(new ID(1));

        $this->assertInstanceOf(StructureItem::class, $item);
        $this->assertSame('1489', $item->getDocumentFileID()?->toString());
    }
}
