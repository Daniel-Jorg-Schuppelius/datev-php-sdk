<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HrPayrollReportsEndpointsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Online\HrPayrollReports;

use Datev\API\Online\Endpoints\HrPayrollReports\{ClientsEndpoint, DocumentsEndpoint};
use Datev\API\Online\OnlineService;
use Datev\Entities\Online\HrPayrollReports\Clients\{ClientWithAccessList, Clients};
use Datev\Entities\Online\HrPayrollReports\Documents\DocumentsMetadata;
use Tests\Contracts\OnlineEndpointTest;

class HrPayrollReportsEndpointsTest extends OnlineEndpointTest {
    private const CLIENT_ID = '1234567-12345';

    protected function getService(): OnlineService {
        return OnlineService::HrPayrollReports;
    }

    public function test_search_clients_and_access_list(): void {
        $this->registerMockResponse('GET', 'clients', 200, [
            ['client_id' => self::CLIENT_ID, 'consultant_number' => 1234567, 'client_number' => 12345],
        ]);
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID, 200, [
            'client_id' => self::CLIENT_ID,
            'consultant_number' => 1234567,
            'client_number' => 12345,
            'document_types' => ['access_granted' => ['LOHNABRECHNUNG'], 'access_denied' => ['LOHNSTEUERANMELDUNG']],
        ]);

        $endpoint = new ClientsEndpoint($this->client);

        $clients = $endpoint->search();
        $this->assertInstanceOf(Clients::class, $clients);

        $client = $endpoint->get(self::CLIENT_ID);
        $this->assertInstanceOf(ClientWithAccessList::class, $client);

        if ($this->isUsingMock()) {
            $this->assertSame(['LOHNABRECHNUNG'], $client->getDocumentTypes()?->getAccessGranted());
        }
    }

    public function test_download_documents_pdf(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/documents/2026-06', 200, '%PDF-1.4 payroll', [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="LOHNABRECHNUNG_2026-06.pdf"',
        ]);

        $endpoint = new DocumentsEndpoint($this->client, self::CLIENT_ID);
        $document = $endpoint->getDocuments('2026-06', ['LOHNABRECHNUNG'], 7, 'application/pdf');

        $this->assertNotNull($document);
        $this->assertSame('application/pdf', $document->contentType);
        $this->assertSame('LOHNABRECHNUNG_2026-06.pdf', $document->filename);
        $this->assertStringStartsWith('%PDF', $document->content);

        $mockClient = $this->mockClient;
        $this->assertNotNull($mockClient);
        $requests = $mockClient->getRecordedRequests();
        $lastRequest = end($requests);
        $this->assertNotFalse($lastRequest);
        $uri = $lastRequest['uri'];
        $this->assertIsString($uri);
        $this->assertStringContainsString('document_types=LOHNABRECHNUNG', $uri);
        $this->assertStringContainsString('employee_number=7', $uri);
        $this->assertSame('application/pdf', $lastRequest['options']['headers']['Accept'] ?? null);
    }

    public function test_status_and_employee_numbers(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/documents/2026-06/status', 200, 'true');
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/documents/2026-06/employee_numbers', 200, [7, 12, 44]);

        $endpoint = new DocumentsEndpoint($this->client, self::CLIENT_ID);

        $this->assertTrue($endpoint->getStatus('2026-06'));
        $this->assertSame([7, 12, 44], $endpoint->getEmployeeNumbers('2026-06'));
    }

    public function test_documents_metadata(): void {
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/documents-metadata', 200, [
            'employee_documents' => [
                ['document_type' => 'LOHNABRECHNUNG', 'employees' => [
                    ['employee_number' => 7, 'document' => [['period' => '2026-06', 'timestamp' => '2026-07-01T00:00:00Z']]],
                ]],
            ],
            'client_documents' => [
                ['document_type' => 'LOHNJOURNAL', 'document' => [['period' => '2026-06', 'timestamp' => '2026-07-01T00:00:00Z']]],
            ],
        ]);

        $endpoint = new DocumentsEndpoint($this->client, self::CLIENT_ID);
        $metadata = $endpoint->getDocumentsMetadata(['period' => '2026-06']);

        $this->assertInstanceOf(DocumentsMetadata::class, $metadata);

        if ($this->isUsingMock()) {
            $employeeDoc = $metadata->getEmployeeDocuments()?->getFirstValue();
            $this->assertSame('LOHNABRECHNUNG', $employeeDoc?->getDocumentType());
            $this->assertSame(7, $employeeDoc->getEmployees()?->getFirstValue()?->getEmployeeNumber());
            $this->assertSame('2026-06', $metadata->getClientDocuments()?->getFirstValue()?->getDocument()?->getFirstValue()?->getPeriod());
        }
    }
}
