<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OnlineService.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online;

/**
 * Registry aller DATEV-Online-Dienste (Cloud-APIs).
 *
 * Kapselt die dienstspezifischen Fakten aus den OpenAPI-Dokumenten in
 * docs/OpenAPI/Online: Host, Basispfad (Produktion/Sandbox), die dokumentierte
 * Schreibweise der API-Key-Header sowie den Dateinamen der Spezifikation.
 */
enum OnlineService: string {
    case AccountingClients = 'accounting-clients';
    case AccountingDocuments = 'accounting-documents';
    case AccountingDxsoJobs = 'accounting-dxso-jobs';
    case AccountingExtfFiles = 'accounting-extf-files';
    case AccountingDataExchange = 'accounting-data-exchange';
    case CashRegister = 'cashregister';
    case HrEau = 'eau';
    case HrExchange = 'hr-exchange';
    case HrExports = 'hr-exports';
    case HrFiles = 'hr-files';
    case HrPayrollReports = 'hr-payrollreports';
    case HrDocuments = 'hr-documents';
    case MasterClientsHealth = 'master-data-master-clients';
    case MyTaxHealth = 'mytax-income-tax-documents';

    /**
     * Schema + Host des Dienstes (ohne Pfad).
     */
    public function host(): string {
        return "https://{$this->value}.api.datev.de";
    }

    /**
     * Basispfad des Dienstes, z. B. "/platform/v2" bzw. "/platform-sandbox/v2".
     *
     * Bei HrFiles liegt die Version innerhalb der Ressourcenpfade (v1/clients/...),
     * bei MyTaxHealth gibt es keine Version im Serverpfad.
     */
    public function basePath(bool $sandbox = false): string {
        $platform = $sandbox ? '/platform-sandbox' : '/platform';

        return $platform . match ($this) {
            self::AccountingClients,
            self::AccountingDocuments,
            self::AccountingDxsoJobs,
            self::CashRegister => '/v2',
            self::AccountingExtfFiles,
            self::MasterClientsHealth => '/v3',
            self::HrFiles,
            self::MyTaxHealth => '',
            default => '/v1',
        };
    }

    /**
     * Dokumentierte Schreibweise des API-Key-Headers für die DATEV-Client-Id.
     * HTTP-Header sind case-insensitiv; die Schreibweise folgt der jeweiligen Spezifikation.
     */
    public function clientIdHeader(): string {
        return match ($this) {
            self::AccountingDataExchange => 'x-datev-client-id',
            self::HrEau,
            self::HrDocuments,
            self::MyTaxHealth => 'X-Datev-Client-ID',
            self::HrExchange,
            self::HrExports,
            self::HrFiles,
            self::HrPayrollReports => 'X-Datev-Client-Id',
            default => 'X-DATEV-Client-Id',
        };
    }

    /**
     * Dokumentierte Schreibweise des API-Key-Headers für das DATEV-Client-Secret.
     */
    public function clientSecretHeader(): string {
        return match ($this) {
            self::AccountingDataExchange => 'x-datev-client-secret',
            self::HrEau,
            self::HrDocuments,
            self::MyTaxHealth,
            self::HrExchange,
            self::HrExports,
            self::HrFiles,
            self::HrPayrollReports => 'X-Datev-Client-Secret',
            default => 'X-DATEV-Client-Secret',
        };
    }

    /**
     * Dateinamen-Präfix der zugehörigen OpenAPI-Spezifikation in docs/OpenAPI/Online.
     * Das Präfix ist versionsunabhängig, damit Spezifikations-Updates keine Codeänderung erfordern.
     */
    public function specFilePattern(): string {
        return match ($this) {
            self::AccountingClients => 'accounting-clients-',
            self::AccountingDocuments => 'accounting_documents-',
            self::AccountingDxsoJobs => 'accounting_dxso-jobs-',
            self::AccountingExtfFiles => 'accounting_extf-files-',
            self::AccountingDataExchange => 'Accounting Data Exchange-',
            self::CashRegister => 'cashregister_import-',
            self::HrEau => 'hr_eau-',
            self::HrExchange => 'hr_exchange-',
            self::HrExports => 'hr_exports-',
            self::HrFiles => 'hr_files-',
            self::HrPayrollReports => 'hr_payrollreports-',
            self::HrDocuments => 'DATEV Datenservice Dokumente Personalwirtschaft',
            self::MasterClientsHealth => 'master-data_master-clients-health-',
            self::MyTaxHealth => 'my-tax_mytax-income-tax-documents-health-',
        };
    }

    /**
     * Verzeichnis-/Domainname für Endpoints, Entities und Tests (z. B. "AccountingClients").
     */
    public function domain(): string {
        return $this->name;
    }

    /**
     * Domain-Schlüssel für den OpenApiMockGenerator (z. B. "online-accounting-clients").
     */
    public function mockDomain(): string {
        return 'online-' . $this->value;
    }
}
