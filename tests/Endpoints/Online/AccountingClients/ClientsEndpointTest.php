<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientsEndpointTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Online\AccountingClients;

use Datev\API\Online\Endpoints\AccountingClients\ClientsEndpoint;
use Datev\API\Online\OnlineService;
use Datev\Entities\Online\AccountingClients\Clients\{Client, Clients};
use Tests\Contracts\OnlineEndpointTest;

class ClientsEndpointTest extends OnlineEndpointTest {
    protected function getService(): OnlineService {
        return OnlineService::AccountingClients;
    }

    private function createEndpoint(): ClientsEndpoint {
        return new ClientsEndpoint($this->client);
    }

    public function test_search_clients(): void {
        $endpoint = $this->createEndpoint();
        $clients = $endpoint->search();

        $this->assertInstanceOf(Clients::class, $clients);
        $this->assertGreaterThan(0, $clients->count());

        $client = $clients->getFirstValue();
        $this->assertInstanceOf(Client::class, $client);
        $this->assertNotEmpty($client->getId());
    }

    public function test_search_clients_with_query_params(): void {
        $endpoint = $this->createEndpoint();
        $clients = $endpoint->search(['top' => 10, 'skip' => 0]);

        $this->assertInstanceOf(Clients::class, $clients);
    }

    public function test_search_page(): void {
        $this->registerMockResponse(
            'GET',
            'clients?top=2&skip=0',
            200,
            [
                ['id' => '29098-55003', 'client_number' => 55003, 'consultant_number' => 29098, 'name' => 'Musterholz'],
                ['id' => '29098-55004', 'client_number' => 55004, 'consultant_number' => 29098, 'name' => 'Muster GmbH'],
            ],
            [
                'Content-Type' => 'application/json;charset=utf-8',
                'Total-Items' => '248',
                'Link' => '<?skip=2&top=2>;rel="next", <?skip=0&top=2>;rel="first"',
            ]
        );

        $endpoint = $this->createEndpoint();
        $page = $endpoint->searchPage(['top' => 2, 'skip' => 0]);

        $this->assertInstanceOf(Clients::class, $page->getItems());
        $this->assertSame(2, $page->getItems()->count());

        if ($this->isUsingMock()) {
            $this->assertSame(248, $page->getTotalItems());
            $this->assertTrue($page->hasNext());
            $this->assertSame('?skip=2&top=2', $page->getNextLink());
        }
    }

    public function test_get_client(): void {
        $endpoint = $this->createEndpoint();

        if ($this->isUsingMock()) {
            $this->registerMockResponse(
                'GET',
                'clients/29098-55003',
                200,
                ['id' => '29098-55003', 'client_number' => 55003, 'consultant_number' => 29098, 'name' => 'Musterholz'],
                ['Content-Type' => 'application/json;charset=utf-8']
            );

            $client = $endpoint->get('29098-55003');

            $this->assertInstanceOf(Client::class, $client);
            $this->assertSame('29098-55003', $client->getId());
            $this->assertSame(55003, $client->getClientNumber());
            $this->assertSame(29098, $client->getConsultantNumber());
        } else {
            $clients = $endpoint->search(['top' => 1]);
            $this->assertNotNull($clients);
            $first = $clients->getFirstValue();
            $this->assertNotNull($first);

            $client = $endpoint->get($first->getId());
            $this->assertInstanceOf(Client::class, $client);
            $this->assertSame($first->getId(), $client->getId());
        }
    }
}
