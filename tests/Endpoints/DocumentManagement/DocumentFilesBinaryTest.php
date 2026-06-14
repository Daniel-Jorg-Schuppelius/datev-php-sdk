<?php
/*
 * Created on   : Sat Jun 14 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentFilesBinaryTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\DocumentManagement;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\DocumentManagement\DocumentFilesEndpoint;
use PHPUnit\Framework\TestCase;
use Tests\Mocks\MockClient;

/**
 * Offline-Regressionstest für den Binär-Download/-Upload des DocumentFiles-Endpoints.
 *
 * Sicherstellt, dass Datei-Inhalte VERBATIM (Byte-für-Byte) übertragen werden und
 * nicht – wie im Schwester-SDK (lexoffice) – fälschlich durch base64_decode oder eine
 * andere Transformation laufen, die binäre Belege/Dokumente zerstört.
 */
class DocumentFilesBinaryTest extends TestCase {
    private function binaryFixture(): string {
        // Repräsentativer "kaputter" Binärinhalt: PDF-Header, Nullbytes, gültige
        // UTF-8-fremde Bytes und Bytes, die base64_decode stillschweigend verändern würde.
        return "%PDF-1.7\x00\x01\x02\xFF\xFE\xFD\r\n" . random_bytes(64) . "%%EOF";
    }

    public function testGetFileByIdReturnsBytesVerbatim(): void {
        $binary = $this->binaryFixture();

        $mock = new MockClient();
        $mock->registerMockResponse(
            'GET',
            '/datev/api/dms/v2/document-files/abc-123',
            200,
            $binary,
            ['Content-Type' => 'application/octet-stream']
        );

        $endpoint = new DocumentFilesEndpoint($mock);
        $result = $endpoint->getFileById('abc-123');

        $this->assertSame($binary, $result, 'Downloaded file content must be byte-identical to the server response.');
    }

    public function testGetFileByIdViaIdObject(): void {
        $binary = $this->binaryFixture();

        $mock = new MockClient();
        $mock->registerMockResponse(
            'GET',
            '/datev/api/dms/v2/document-files/11111111-2222-3333-4444-555555555555',
            200,
            $binary,
            ['Content-Type' => 'application/octet-stream']
        );

        $endpoint = new DocumentFilesEndpoint($mock);
        $result = $endpoint->getFile(new ID('11111111-2222-3333-4444-555555555555'));

        $this->assertSame($binary, $result);
    }

    public function testUploadSendsBodyVerbatim(): void {
        $binary = $this->binaryFixture();

        $mock = new MockClient();
        $mock->registerMockResponse(
            'POST',
            '/datev/api/dms/v2/document-files',
            201,
            ['id' => 'new-file-id', 'name' => 'upload.pdf'],
            ['Content-Type' => 'application/json']
        );

        $endpoint = new DocumentFilesEndpoint($mock);
        $entity = $endpoint->upload($binary);

        $this->assertNotNull($entity);
        $this->assertSame('new-file-id', $entity->getID());

        $recorded = $mock->getRecordedRequests();
        $this->assertCount(1, $recorded);
        $this->assertSame('POST', $recorded[0]['method']);
        $this->assertSame(
            $binary,
            $recorded[0]['options']['body'] ?? null,
            'Upload must transmit the raw bytes unchanged in the request body.'
        );
        $this->assertSame(
            'application/octet-stream',
            $recorded[0]['options']['headers']['Content-Type'] ?? null
        );
    }
}
