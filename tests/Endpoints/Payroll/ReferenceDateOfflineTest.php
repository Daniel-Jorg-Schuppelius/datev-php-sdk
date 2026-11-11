<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ReferenceDateOfflineTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use APIToolkit\Entities\ID;
use DateTimeImmutable;
use Datev\API\Desktop\Endpoints\Payroll\{AccountEndpoint, CostCentersEndpoint};
use Datev\Entities\Common\Clients\ClientID;
use Datev\Entities\Payroll\Accounts\{Account, Accounts};
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use Tests\Mocks\MockClient;

/**
 * Jeder GET der Lohn-API verlangt reference-date; Einzelabrufe konnten es nicht
 * übergeben. Die Konten-Liste las vorher /clients statt /clients/{id}/account.
 */
final class ReferenceDateOfflineTest extends TestCase {
    private const CLIENT = '11111111-2222-4333-8444-555555555555';
    private const BASE = '/datev/api/hr/v3/clients/' . self::CLIENT;

    private function client(): MockClient {
        $client = new MockClient;
        $client->registerMockResponse('GET', self::BASE . '/cost-centers', 200, [['id' => '1', 'name' => 'Verwaltung']]);
        $client->registerMockResponse('GET', self::BASE . '/cost-centers/1', 200, ['id' => '1', 'name' => 'Verwaltung']);

        return $client;
    }

    private function lastUri(MockClient $client): string {
        $requests = $client->getRecordedRequests();
        $last = array_pop($requests);
        $this->assertIsArray($last);

        return (string) $last['uri'];
    }

    public function test_single_lookup_sends_todays_reference_date_by_default(): void {
        $client = $this->client();
        (new CostCentersEndpoint($client, new NullLogger, new ClientID(self::CLIENT)))->get(new ID('1'));

        $this->assertMatchesRegularExpression('#^' . self::BASE . '/cost-centers/1\?reference-date=\d{4}-\d{2}-\d{2}$#', $this->lastUri($client));
    }

    public function test_reference_date_of_the_endpoint_applies_to_every_call(): void {
        $client = $this->client();
        $endpoint = new CostCentersEndpoint($client, new NullLogger, new ClientID(self::CLIENT));
        $endpoint->setReferenceDate(new DateTimeImmutable('2024-03-31'));

        $endpoint->search();
        $this->assertSame(self::BASE . '/cost-centers?reference-date=2024-03-31', $this->lastUri($client));

        $endpoint->search(['reference-date' => '2024-01-31']);
        $this->assertSame(self::BASE . '/cost-centers?reference-date=2024-01-31', $this->lastUri($client));
    }

    public function test_invalid_reference_date_is_rejected(): void {
        $endpoint = new CostCentersEndpoint(new MockClient, new NullLogger, new ClientID(self::CLIENT));

        $this->expectException(\InvalidArgumentException::class);
        $endpoint->search(['reference-date' => '31.01.2024']);
    }

    public function test_accounts_are_read_per_client_and_per_employee(): void {
        $client = new MockClient;
        $client->registerMockResponse('GET', self::BASE . '/account', 200, [['id' => '00001', 'iban' => 'DE89370400440532013000']]);
        $client->registerMockResponse('GET', self::BASE . '/employees/00001/account', 200, ['id' => '00001', 'iban' => 'DE89370400440532013000']);
        $endpoint = new AccountEndpoint($client, new NullLogger, new ClientID(self::CLIENT));

        $this->assertInstanceOf(Accounts::class, $endpoint->search());
        $this->assertStringStartsWith(self::BASE . '/account?reference-date=', $this->lastUri($client));

        $this->assertInstanceOf(Account::class, $endpoint->get(new ID('00001')));
        $this->assertStringStartsWith(self::BASE . '/employees/00001/account?reference-date=', $this->lastUri($client));
    }
}
