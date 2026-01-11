<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MockClientTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Mocks;

use PHPUnit\Framework\TestCase;
use Tests\TestAPIClientFactory;

/**
 * Tests für den MockClient selbst.
 */
class MockClientTest extends TestCase {
    private MockClient $mockClient;

    protected function setUp(): void {
        parent::setUp();
        $this->mockClient = new MockClient('https://127.0.0.1:58452', TestAPIClientFactory::getLogger());
    }

    protected function tearDown(): void {
        $this->mockClient->reset();
        parent::tearDown();
    }

    public function testRegisterMockResponse(): void {
        $this->mockClient->registerMockResponse(
            'GET',
            '/datev/api/test',
            200,
            ['message' => 'success']
        );

        $response = $this->mockClient->get('/datev/api/test');

        $this->assertEquals(200, $response->getStatusCode());
        $body = json_decode($response->getBody()->getContents(), true);
        $this->assertEquals('success', $body['message']);
    }

    public function testWildcardMatching(): void {
        $this->mockClient->registerMockResponse(
            'GET',
            '/datev/api/clients/*/records',
            200,
            ['records' => []]
        );

        $response = $this->mockClient->get('/datev/api/clients/12345/records');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testIdPlaceholderMatching(): void {
        $this->mockClient->registerMockResponse(
            'GET',
            '/datev/api/clients/{id}',
            200,
            ['id' => 'test']
        );

        $response = $this->mockClient->get('/datev/api/clients/abc123');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGuidPlaceholderMatching(): void {
        $this->mockClient->registerMockResponse(
            'GET',
            '/datev/api/items/{guid}',
            200,
            ['guid' => 'test']
        );

        $response = $this->mockClient->get('/datev/api/items/550e8400-e29b-41d4-a716-446655440000');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testUnregisteredEndpointReturns404(): void {
        $response = $this->mockClient->get('/datev/api/unknown');

        $this->assertEquals(404, $response->getStatusCode());
    }

    public function testRecordsRequests(): void {
        $this->mockClient->registerMockResponse('GET', '/datev/api/test', 200, []);
        $this->mockClient->registerMockResponse('POST', '/datev/api/test', 201, []);

        $this->mockClient->get('/datev/api/test');
        $this->mockClient->post('/datev/api/test', ['json' => ['data' => 'value']]);

        $requests = $this->mockClient->getRecordedRequests();

        $this->assertCount(2, $requests);
        $this->assertEquals('GET', $requests[0]['method']);
        $this->assertEquals('POST', $requests[1]['method']);
    }

    public function testClearRecordedRequests(): void {
        $this->mockClient->registerMockResponse('GET', '/datev/api/test', 200, []);
        $this->mockClient->get('/datev/api/test');

        $this->assertCount(1, $this->mockClient->getRecordedRequests());

        $this->mockClient->clearRecordedRequests();

        $this->assertCount(0, $this->mockClient->getRecordedRequests());
    }

    public function testReset(): void {
        $this->mockClient->registerMockResponse('GET', '/datev/api/test', 200, ['data' => 'value']);
        $this->mockClient->get('/datev/api/test');

        $this->mockClient->reset();

        // Mock-Response sollte weg sein
        $response = $this->mockClient->get('/datev/api/test');
        $this->assertEquals(404, $response->getStatusCode());

        // Aufgezeichnete Requests sollten weg sein
        $this->assertCount(1, $this->mockClient->getRecordedRequests());
    }

    public function testHttpMethods(): void {
        $this->mockClient->registerMockResponse('GET', '/datev/api/test', 200, ['method' => 'GET']);
        $this->mockClient->registerMockResponse('POST', '/datev/api/test', 201, ['method' => 'POST']);
        $this->mockClient->registerMockResponse('PUT', '/datev/api/test', 200, ['method' => 'PUT']);
        $this->mockClient->registerMockResponse('PATCH', '/datev/api/test', 200, ['method' => 'PATCH']);
        $this->mockClient->registerMockResponse('DELETE', '/datev/api/test', 204, null);

        $this->assertEquals(200, $this->mockClient->get('/datev/api/test')->getStatusCode());
        $this->assertEquals(201, $this->mockClient->post('/datev/api/test')->getStatusCode());
        $this->assertEquals(200, $this->mockClient->put('/datev/api/test')->getStatusCode());
        $this->assertEquals(200, $this->mockClient->patch('/datev/api/test')->getStatusCode());
        $this->assertEquals(204, $this->mockClient->delete('/datev/api/test')->getStatusCode());
    }

    public function testRegisterMultipleResponses(): void {
        $responses = [
            'GET:/datev/api/clients' => [
                'statusCode' => 200,
                'body' => ['clients' => []],
            ],
            'POST:/datev/api/clients' => [
                'statusCode' => 201,
                'body' => ['id' => 'new-client'],
            ],
        ];

        $this->mockClient->registerMockResponses($responses);

        $getResponse = $this->mockClient->get('/datev/api/clients');
        $this->assertEquals(200, $getResponse->getStatusCode());

        $postResponse = $this->mockClient->post('/datev/api/clients');
        $this->assertEquals(201, $postResponse->getStatusCode());
    }

    public function testFluentInterface(): void {
        $result = $this->mockClient
            ->registerMockResponse('GET', '/api/test1', 200, [])
            ->registerMockResponse('GET', '/api/test2', 200, []);

        $this->assertInstanceOf(MockClient::class, $result);
    }

    public function testBaseUrlGetterAndSetter(): void {
        $this->assertEquals('https://127.0.0.1:58452', $this->mockClient->getBaseUrl());

        $this->mockClient->setBaseUrl('https://localhost:9999/');

        $this->assertEquals('https://localhost:9999', $this->mockClient->getBaseUrl());
    }

    public function testDefaultHeaders(): void {
        $this->mockClient->addDefaultHeader('X-Custom-Header', 'value');
        $headers = $this->mockClient->getDefaultHeaders();

        $this->assertArrayHasKey('X-Custom-Header', $headers);
        $this->assertEquals('value', $headers['X-Custom-Header']);

        $this->mockClient->removeDefaultHeader('X-Custom-Header');
        $headers = $this->mockClient->getDefaultHeaders();

        $this->assertArrayNotHasKey('X-Custom-Header', $headers);
    }
}
