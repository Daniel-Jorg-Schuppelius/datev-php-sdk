<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OnlineServiceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\API\Online;

use Datev\API\Online\OnlineService;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class OnlineServiceTest extends TestCase {
    /**
     * Erwartete Werte gemäß den OpenAPI-Spezifikationen in docs/OpenAPI/Online.
     *
     * @return array<string, array{OnlineService, string, string, string}>
     */
    public static function serviceProvider(): array {
        return [
            'accounting-clients' => [OnlineService::AccountingClients, 'https://accounting-clients.api.datev.de', '/platform/v2', 'X-DATEV-Client-Id'],
            'accounting-documents' => [OnlineService::AccountingDocuments, 'https://accounting-documents.api.datev.de', '/platform/v2', 'X-DATEV-Client-Id'],
            'accounting-dxso-jobs' => [OnlineService::AccountingDxsoJobs, 'https://accounting-dxso-jobs.api.datev.de', '/platform/v2', 'X-DATEV-Client-Id'],
            'accounting-extf-files' => [OnlineService::AccountingExtfFiles, 'https://accounting-extf-files.api.datev.de', '/platform/v3', 'X-DATEV-Client-Id'],
            'accounting-data-exchange' => [OnlineService::AccountingDataExchange, 'https://accounting-data-exchange.api.datev.de', '/platform/v1', 'x-datev-client-id'],
            'cashregister' => [OnlineService::CashRegister, 'https://cashregister.api.datev.de', '/platform/v2', 'X-DATEV-Client-Id'],
            'eau' => [OnlineService::HrEau, 'https://eau.api.datev.de', '/platform/v1', 'X-Datev-Client-ID'],
            'hr-exchange' => [OnlineService::HrExchange, 'https://hr-exchange.api.datev.de', '/platform/v1', 'X-Datev-Client-Id'],
            'hr-exports' => [OnlineService::HrExports, 'https://hr-exports.api.datev.de', '/platform/v1', 'X-Datev-Client-Id'],
            'hr-files' => [OnlineService::HrFiles, 'https://hr-files.api.datev.de', '/platform', 'X-Datev-Client-Id'],
            'hr-payrollreports' => [OnlineService::HrPayrollReports, 'https://hr-payrollreports.api.datev.de', '/platform/v1', 'X-Datev-Client-Id'],
            'hr-documents' => [OnlineService::HrDocuments, 'https://hr-documents.api.datev.de', '/platform/v1', 'X-Datev-Client-ID'],
            'master-clients-health' => [OnlineService::MasterClientsHealth, 'https://master-data-master-clients.api.datev.de', '/platform/v3', 'X-DATEV-Client-Id'],
            'mytax-health' => [OnlineService::MyTaxHealth, 'https://mytax-income-tax-documents.api.datev.de', '/platform', 'X-Datev-Client-ID'],
        ];
    }

    #[DataProvider('serviceProvider')]
    public function test_service_metadata(OnlineService $service, string $host, string $basePath, string $clientIdHeader): void {
        $this->assertSame($host, $service->host());
        $this->assertSame($basePath, $service->basePath());
        $this->assertSame($clientIdHeader, $service->clientIdHeader());
    }

    #[DataProvider('serviceProvider')]
    public function test_sandbox_base_path(OnlineService $service, string $host, string $basePath, string $clientIdHeader): void {
        $expected = str_replace('/platform', '/platform-sandbox', $basePath);
        $this->assertSame($expected, $service->basePath(true));
    }

    #[DataProvider('serviceProvider')]
    public function test_spec_file_exists(OnlineService $service, string $host, string $basePath, string $clientIdHeader): void {
        $files = glob(__DIR__ . '/../../../docs/OpenAPI/Online/' . $service->specFilePattern() . '*.json');

        $this->assertNotEmpty($files, "No OpenAPI spec found for {$service->value} (pattern: {$service->specFilePattern()})");
    }

    public function test_secret_header_matches_id_header_casing(): void {
        foreach (OnlineService::cases() as $service) {
            $idPrefix = substr($service->clientIdHeader(), 0, strlen('X-DATEV-Client'));
            $secretPrefix = substr($service->clientSecretHeader(), 0, strlen('X-DATEV-Client'));
            $this->assertSame($idPrefix, $secretPrefix, "Header casing mismatch for {$service->value}");
        }
    }

    public function test_domain_names_are_unique(): void {
        $domains = array_map(fn (OnlineService $service) => $service->domain(), OnlineService::cases());
        $this->assertSame($domains, array_unique($domains));
        $this->assertCount(14, $domains);
    }
}
