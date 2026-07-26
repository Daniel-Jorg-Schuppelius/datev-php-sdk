<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Online\AccountingClients;

use Datev\Entities\Online\AccountingClients\Clients\{Client, Clients, Service};
use Tests\Contracts\EntityTest;

class ClientTest extends EntityTest {
    private const SPEC_EXAMPLE = [
        'client_number' => 55003,
        'consultant_number' => 29098,
        'id' => '29098-55003',
        'name' => 'Musterholz',
        'services' => [
            [
                'name' => 'Belegbilderservice',
                'scopes' => ['accounting:documents'],
            ],
        ],
    ];

    public function test_from_json(): void {
        $json = json_encode(self::SPEC_EXAMPLE);
        $this->assertNotFalse($json);
        $client = Client::fromJson($json);

        $this->assertSame('29098-55003', $client->getId());
        $this->assertSame(55003, $client->getClientNumber());
        $this->assertSame(29098, $client->getConsultantNumber());
        $this->assertSame('Musterholz', $client->getName());

        $services = $client->getServices();
        $this->assertNotNull($services);
        $this->assertSame(1, $services->count());

        $service = $services->getFirstValue();
        $this->assertInstanceOf(Service::class, $service);
        $this->assertSame('Belegbilderservice', $service->getName());
        $this->assertSame(['accounting:documents'], $service->getScopes());
    }

    public function test_consultant_client_number(): void {
        $json = json_encode(self::SPEC_EXAMPLE);
        $this->assertNotFalse($json);
        $client = Client::fromJson($json);

        $ccn = $client->getConsultantClientNumber();
        $this->assertNotNull($ccn);
        $this->assertSame(29098, $ccn->getConsultantNumber());
        $this->assertSame(55003, $ccn->getClientNumber());
        $this->assertSame('29098-55003', $ccn->toString());
    }

    public function test_collection_from_json(): void {
        $json = json_encode([self::SPEC_EXAMPLE, self::SPEC_EXAMPLE]);
        $this->assertNotFalse($json);
        $clients = Clients::fromJson($json);

        $this->assertSame(2, $clients->count());
        $this->assertInstanceOf(Client::class, $clients->getFirstValue());
    }
}
