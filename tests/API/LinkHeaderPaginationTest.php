<?php
/*
 * Created on   : Wed Jul 29 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LinkHeaderPaginationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\API;

use APIToolkit\API\Authentication\BearerAuthentication;
use Datev\API\Online\{Client, OnlineService};
use Datev\API\Online\Endpoints\AccountingClients\ClientsEndpoint;
use GuzzleHttp\{Client as HttpClient, HandlerStack};
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * accounting-clients paginiert über RFC-5988-Link-Header. searchAll() folgt
 * rel="next" über den LinkHeaderPaginator des api-toolkits, statt Aufrufern
 * das Weiterblättern zu überlassen.
 */
class LinkHeaderPaginationTest extends TestCase {
    /** @var array<int, RequestInterface> */
    private array $requests = [];

    private MockHandler $handler;

    /**
     * Guzzles Middleware::history() schreibt in ein array|ArrayAccess und ist
     * damit nicht typisierbar; dieser Recorder hält nur die Requests fest.
     */
    private function recorder(): callable {
        return function (callable $handler): callable {
            return function (RequestInterface $request, array $options) use ($handler) {
                $this->requests[] = $request;

                return $handler($request, $options);
            };
        };
    }

    protected function setUp(): void {
        parent::setUp();
        $this->handler = new MockHandler;
        $this->requests = [];
    }

    public function test_search_all_follows_the_next_link(): void {
        $next = 'https://accounting-clients.api.datev.de/platform-sandbox/v2/clients?page=2';
        $this->handler->append(
            new Response(200, ['Link' => '<' . $next . '>; rel="next"'], $this->page(['1-1'])),
            new Response(200, [], $this->page(['1-2'])),
        );

        $ids = [];
        foreach ((new ClientsEndpoint($this->client()))->searchAll() as $client) {
            $ids[] = (string) $client->getId();
        }

        $this->assertSame(['1-1', '1-2'], $ids);
        $this->assertCount(2, $this->requests);
        $this->assertSame($next, (string) $this->requests[1]->getUri());
    }

    public function test_search_all_stops_without_a_next_link(): void {
        $this->handler->append(new Response(200, [], $this->page(['1-1'])));

        $this->assertCount(1, iterator_to_array((new ClientsEndpoint($this->client()))->searchAll(), false));
        $this->assertCount(1, $this->requests);
    }

    public function test_max_pages_caps_the_iteration(): void {
        $next = 'https://accounting-clients.api.datev.de/platform-sandbox/v2/clients?page=2';
        $this->handler->append(
            new Response(200, ['Link' => '<' . $next . '>; rel="next"'], $this->page(['1-1'])),
            new Response(200, ['Link' => '<' . $next . '>; rel="next"'], $this->page(['1-2'])),
            new Response(200, [], $this->page(['1-3'])),
        );

        $this->assertCount(2, iterator_to_array((new ClientsEndpoint($this->client()))->searchAll([], [], 2), false));
        $this->assertCount(2, $this->requests);
    }

    /**
     * @param array<int, string> $ids
     */
    private function page(array $ids): string {
        return (string) json_encode(array_map(static fn (string $id): array => [
            'id' => $id,
            'name' => 'Mandant ' . $id,
        ], $ids));
    }

    private function client(): Client {
        $stack = HandlerStack::create($this->handler);
        $stack->push($this->recorder());

        $client = new Client(
            OnlineService::AccountingClients,
            new BearerAuthentication('access-token'),
            'client-id',
            true,
            null,
            false,
            new HttpClient(['handler' => $stack])
        );
        $client->setRequestInterval(0.0);

        return $client;
    }
}
