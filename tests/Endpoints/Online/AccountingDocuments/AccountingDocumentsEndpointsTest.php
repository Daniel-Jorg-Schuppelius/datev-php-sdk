<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingDocumentsEndpointsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Online\AccountingDocuments;

use Datev\API\Online\Endpoints\AccountingDocuments\{ClientsEndpoint, DocumentTypesEndpoint, DocumentsEndpoint, DuoVersionEndpoint};
use Datev\API\Online\OnlineService;
use Datev\Entities\Online\Accounting\Clients\{ClientBasics, Clients};
use Datev\Entities\Online\AccountingDocuments\Documents\Document;
use Datev\Entities\Online\AccountingDocuments\DocumentTypes\DocumentTypes;
use Datev\Entities\Online\AccountingDocuments\DuoVersion\DuoVersion;
use Datev\Enums\Online\{DebitCreditIdentifier, DocumentCategory};
use Tests\Contracts\OnlineEndpointTest;

class AccountingDocumentsEndpointsTest extends OnlineEndpointTest {
    private const CLIENT_ID = '29098-55003';

    protected function getService(): OnlineService {
        return OnlineService::AccountingDocuments;
    }

    public function test_search_clients(): void {
        $this->registerMockResponse('GET', 'clients', 200, [
            ['client_number' => 55003, 'consultant_number' => 29098, 'id' => self::CLIENT_ID, 'name' => 'Muster GmbH'],
        ]);

        $endpoint = new ClientsEndpoint($this->client);
        $clients = $endpoint->search();

        $this->assertInstanceOf(Clients::class, $clients);
    }

    public function test_get_client_basics(): void {
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID, 200, [
            'client_number' => 55003,
            'consultant_number' => 29098,
            'id' => self::CLIENT_ID,
            'name' => 'Muster GmbH',
            'is_document_management_available' => true,
            'basic_accounting_information' => [],
        ]);

        $endpoint = new ClientsEndpoint($this->client);
        $client = $endpoint->get(self::CLIENT_ID);

        $this->assertInstanceOf(ClientBasics::class, $client);

        if ($this->isUsingMock()) {
            $this->assertTrue($client->isDocumentManagementAvailable());
        }
    }

    public function test_search_document_types(): void {
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/document-types', 200, [
            ['name' => 'Rechnungseingang', 'category' => 'invoices_received', 'debit_credit_identifier' => 'debit'],
        ]);

        $endpoint = new DocumentTypesEndpoint($this->client, self::CLIENT_ID);
        $types = $endpoint->search();

        $this->assertInstanceOf(DocumentTypes::class, $types);

        if ($this->isUsingMock()) {
            $type = $types->getFirstValue();
            $this->assertNotNull($type);
            $this->assertSame(DocumentCategory::InvoicesReceived, $type->getCategory());
            $this->assertSame(DebitCreditIdentifier::Debit, $type->getDebitCreditIdentifier());
        }
    }

    public function test_get_duo_version(): void {
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/duo-version', 200, [
            'allowed_file_extensions' => ['pdf', 'jpg'],
            'allowed_staple_file_extensions' => ['pdf'],
            'staple_logic' => 'default',
        ]);

        $endpoint = new DuoVersionEndpoint($this->client, self::CLIENT_ID);
        $version = $endpoint->get();

        $this->assertInstanceOf(DuoVersion::class, $version);

        if ($this->isUsingMock()) {
            $this->assertSame(['pdf', 'jpg'], $version->getAllowedFileExtensions());
        }
    }

    public function test_upload_document(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('POST', 'clients/' . self::CLIENT_ID . '/documents', 201, [
            'id' => '07b94406-666b-4b3a-acdc-c8e783dcd7cd',
            'files' => [['id' => 'f-1', 'name' => 'invoice.pdf', 'size' => 1024, 'upload_date' => '2026-07-03', 'media_type' => 'application/pdf']],
            'document_type' => 'Rechnungseingang',
            'note' => 'Testbeleg',
        ]);

        $endpoint = new DocumentsEndpoint($this->client, self::CLIENT_ID);
        $document = $endpoint->upload('pdf-content', 'invoice.pdf', ['document_type' => 'Rechnungseingang', 'note' => 'Testbeleg']);

        $this->assertInstanceOf(Document::class, $document);
        $this->assertSame('07b94406-666b-4b3a-acdc-c8e783dcd7cd', $document->getId());
        $this->assertSame(1, $document->getFiles()?->count());

        $mockClient = $this->mockClient;
        $this->assertNotNull($mockClient);
        $requests = $mockClient->getRecordedRequests();
        $lastRequest = end($requests);
        $this->assertNotFalse($lastRequest);
        $multipartNames = array_column($lastRequest['options']['multipart'], 'name');
        $this->assertSame(['file', 'metadata'], $multipartNames);
    }

    public function test_upload_document_with_id(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $documentId = '07b94406-666b-4b3a-acdc-c8e783dcd7cd';
        $this->registerMockResponse('PUT', 'clients/' . self::CLIENT_ID . '/documents/' . $documentId, 201, ['id' => $documentId]);

        $endpoint = new DocumentsEndpoint($this->client, self::CLIENT_ID);
        $document = $endpoint->uploadWithId($documentId, 'pdf-content', 'invoice.pdf');

        $this->assertInstanceOf(Document::class, $document);
        $this->assertSame($documentId, $document->getId());
    }

    public function test_upload_stapled_documents(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('PUT', 'clients/' . self::CLIENT_ID . '/documents/stapled', 201, ['id' => 'stapled-1']);

        $endpoint = new DocumentsEndpoint($this->client, self::CLIENT_ID);
        $document = $endpoint->uploadStapled([
            ['contents' => 'page-1', 'filename' => 'page1.pdf'],
            ['contents' => 'page-2', 'filename' => 'page2.pdf'],
        ], ['document_type' => 'Rechnungseingang'], ['sequence_first_guid' => 'abc', 'sequence_position' => 1]);

        $this->assertInstanceOf(Document::class, $document);

        $mockClient = $this->mockClient;
        $this->assertNotNull($mockClient);
        $requests = $mockClient->getRecordedRequests();
        $lastRequest = end($requests);
        $this->assertNotFalse($lastRequest);
        $multipartNames = array_column($lastRequest['options']['multipart'], 'name');
        $this->assertSame(['files', 'files', 'metadata', 'custom_metadata'], $multipartNames);
    }
}
