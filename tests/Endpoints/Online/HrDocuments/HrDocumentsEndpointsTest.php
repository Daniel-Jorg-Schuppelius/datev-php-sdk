<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HrDocumentsEndpointsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Online\HrDocuments;

use Datev\API\Online\Endpoints\HrDocuments\{ClientsEndpoint, DocumentsEndpoint};
use Datev\API\Online\OnlineService;
use Datev\Entities\Online\Common\ConsultantClientNumber;
use Datev\Entities\Online\HrDocuments\Clients\{Client, Clients};
use Tests\Contracts\OnlineEndpointTest;

class HrDocumentsEndpointsTest extends OnlineEndpointTest {
    private const CLIENT_GUID = '07b94406-666b-4b3a-acdc-c8e783dcd7cd';

    protected function getService(): OnlineService {
        return OnlineService::HrDocuments;
    }

    public function test_search_clients_unwraps_response(): void {
        $this->registerMockResponse('GET', 'clients', 200, [
            'clients' => [
                ['client_guid' => self::CLIENT_GUID, 'consultant_number' => 1234567, 'client_number' => 12345, 'name' => 'Muster GmbH'],
            ],
        ]);

        $endpoint = new ClientsEndpoint($this->client);
        $clients = $endpoint->search();

        $this->assertInstanceOf(Clients::class, $clients);

        if ($this->isUsingMock()) {
            $this->assertSame(self::CLIENT_GUID, $clients->getFirstValue()->getClientGuid());
        }
    }

    public function test_get_client_by_consultant_client_number(): void {
        $this->registerMockResponse('GET', 'clients/1234567-12345', 200, [
            'client_guid' => self::CLIENT_GUID, 'consultant_number' => 1234567, 'client_number' => 12345, 'name' => 'Muster GmbH',
        ]);

        $endpoint = new ClientsEndpoint($this->client);
        $client = $endpoint->get(new ConsultantClientNumber(1234567, 12345));

        $this->assertInstanceOf(Client::class, $client);
    }

    public function test_upload_by_guid(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('POST', 'clients/' . self::CLIENT_GUID . '/documents', 200);

        $endpoint = new DocumentsEndpoint($this->client);
        $endpoint->uploadByGuid(self::CLIENT_GUID, 'pdf-content', 'vertrag.pdf', 'MyApp 1.0');

        $requests = $this->mockClient->getRecordedRequests();
        $lastRequest = end($requests);
        $this->assertSame('clients/' . self::CLIENT_GUID . '/documents', $lastRequest['uri']);
        $this->assertSame('MyApp 1.0', $lastRequest['options']['headers']['Client-Application'] ?? null);
        $this->assertSame('file', $lastRequest['options']['multipart'][0]['name']);
    }

    public function test_upload_by_consultant_client_number(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('POST', 'clients/1234567-12345/documents/upload', 200);

        $endpoint = new DocumentsEndpoint($this->client);
        $endpoint->uploadByConsultantClientNumber(new ConsultantClientNumber(1234567, 12345), 'pdf-content', 'vertrag.pdf');

        $requests = $this->mockClient->getRecordedRequests();
        $lastRequest = end($requests);
        $this->assertSame('clients/1234567-12345/documents/upload', $lastRequest['uri']);
    }
}
