<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OnlineClientTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\API\Online;

use Datev\API\Online\{Client, OnlineService};
use PHPUnit\Framework\TestCase;

/**
 * Testbarer Client, der prefixUri() öffentlich macht (keine HTTP-Aufrufe).
 */
final class TestableOnlineClient extends Client {
    public function exposePrefixUri(string $uri): string {
        return $this->prefixUri($uri);
    }
}

class OnlineClientTest extends TestCase {
    private function createClient(OnlineService $service, bool $sandbox = false): TestableOnlineClient {
        return new TestableOnlineClient($service, null, null, $sandbox);
    }

    public function test_prefixes_service_relative_uri(): void {
        $client = $this->createClient(OnlineService::AccountingClients);

        $this->assertSame('/platform/v2/clients', $client->exposePrefixUri('clients'));
        $this->assertSame('/platform/v2/clients/29098-55003?top=5', $client->exposePrefixUri('clients/29098-55003?top=5'));
    }

    public function test_sandbox_prefix(): void {
        $client = $this->createClient(OnlineService::AccountingClients, true);

        $this->assertSame('/platform-sandbox/v2/clients', $client->exposePrefixUri('clients'));
    }

    public function test_rooted_and_absolute_uris_pass_through(): void {
        $client = $this->createClient(OnlineService::AccountingExtfFiles);

        $this->assertSame('/platform/v3/clients/1-2/extf-files/jobs/abc', $client->exposePrefixUri('/platform/v3/clients/1-2/extf-files/jobs/abc'));
        $this->assertSame('https://accounting-extf-files.api.datev.de/platform/v3/clients', $client->exposePrefixUri('https://accounting-extf-files.api.datev.de/platform/v3/clients'));
        $this->assertSame('', $client->exposePrefixUri(''));
    }

    public function test_default_headers_contain_client_id(): void {
        $client = new Client(OnlineService::HrExports, null, 'my-datev-client-id');
        $headers = $client->getDefaultHeaders();

        $this->assertSame('my-datev-client-id', $headers['X-Datev-Client-Id'] ?? null);
        $this->assertSame('application/json', $headers['Accept'] ?? null);
        $this->assertArrayNotHasKey('Content-Type', $headers);
    }

    public function test_for_api_key_sets_both_headers(): void {
        $client = Client::forApiKey(OnlineService::CashRegister, 'the-id', 'the-secret');
        $headers = $client->getDefaultHeaders();

        $this->assertSame('the-id', $headers['X-DATEV-Client-Id'] ?? null);
        $this->assertSame('the-secret', $headers['X-DATEV-Client-Secret'] ?? null);
    }

    public function test_service_accessors(): void {
        $client = new Client(OnlineService::HrFiles, null, null, true);

        $this->assertSame(OnlineService::HrFiles, $client->getService());
        $this->assertTrue($client->isSandbox());
        $this->assertSame('/platform-sandbox', $client->getServicePath());
        $this->assertSame('https://hr-files.api.datev.de', $client->getBaseUrl());
    }
}
