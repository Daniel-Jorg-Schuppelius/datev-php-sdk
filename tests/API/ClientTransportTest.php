<?php
/*
 * Created on   : Wed Jul 29 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientTransportTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\API;

use APIToolkit\API\Authentication\{BasicAuthentication, BearerAuthentication};
use Datev\API\Desktop\Client as DesktopClient;
use Datev\API\Desktop\Endpoints\Diagnostics\EchoEndpoint;
use Datev\API\Online\{Client as OnlineClient, OnlineService};
use GuzzleHttp\{Client as HttpClient, HandlerStack};
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * Deckt die Transportschicht ab, die die MockClient-basierten Endpoint-Tests
 * überspringen: Ziel-URL inklusive Basispfad, Auth- und Mandanten-Header der
 * tatsächlich abgesetzten Requests.
 */
class ClientTransportTest extends TestCase {
    private MockHandler $handler;

    protected function setUp(): void {
        parent::setUp();
        $this->handler = new MockHandler;
    }

    public function test_desktop_client_sends_basic_auth_to_the_local_api(): void {
        $this->handler->append(new Response(200, ['Content-Type' => 'application/json'], (string) json_encode([
            'message' => 'echo',
        ])));

        $client = new DesktopClient(
            new BasicAuthentication('user', 'secret'),
            'https://127.0.0.1:58452',
            null,
            false,
            false,
            $this->httpClient()
        );
        $client->setRequestInterval(0.0);
        (new EchoEndpoint($client))->get();

        $request = $this->lastRequest();
        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('https://127.0.0.1:58452/datev/api/diagnostics/v1/echo', (string) $request->getUri());
        $this->assertSame('Basic ' . base64_encode('user:secret'), $request->getHeaderLine('Authorization'));
    }

    public function test_online_client_prefixes_the_service_base_path_and_sends_client_id(): void {
        $this->handler->append(new Response(200, ['Content-Type' => 'application/json'], (string) json_encode([])));

        $service = OnlineService::AccountingClients;
        $client = new OnlineClient($service, new BearerAuthentication('access-token'), 'client-id-1', true, null, false, $this->httpClient());
        $client->setRequestInterval(0.0);
        $client->get('clients');

        $request = $this->lastRequest();
        $this->assertSame(
            $service->host() . $service->basePath(true) . '/clients',
            (string) $request->getUri()
        );
        $this->assertSame('Bearer access-token', $request->getHeaderLine('Authorization'));
        $this->assertSame('client-id-1', $request->getHeaderLine($service->clientIdHeader()));
    }

    public function test_online_client_leaves_absolute_urls_untouched(): void {
        $this->handler->append(new Response(200, [], '{}'));

        $client = new OnlineClient(OnlineService::AccountingClients, null, null, true, null, false, $this->httpClient());
        $client->setRequestInterval(0.0);
        // Location-Header aus einem Job-Response sind bereits vollständig.
        $client->get('https://accounting.api.datev.de/platform-sandbox/v2/jobs/4711');

        $this->assertSame(
            'https://accounting.api.datev.de/platform-sandbox/v2/jobs/4711',
            (string) $this->lastRequest()->getUri()
        );
    }

    private function httpClient(): HttpClient {
        return new HttpClient(['handler' => HandlerStack::create($this->handler)]);
    }

    private function lastRequest(): RequestInterface {
        $request = $this->handler->getLastRequest();
        $this->assertNotNull($request);

        return $request;
    }
}
