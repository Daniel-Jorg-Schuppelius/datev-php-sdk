# DATEV PHP SDK

[![PHP Version](https://img.shields.io/badge/php-8.2%20|%208.3%20|%208.4-blue)](https://php.net)
[![License](https://img.shields.io/badge/license-MIT-green)](LICENSE)
[![Packagist](https://img.shields.io/packagist/v/daniel-jorg-schuppelius/datev-php-sdk)](https://packagist.org/packages/daniel-jorg-schuppelius/datev-php-sdk)

Ein PHP SDK für die **DATEV Desktop API** (DATEVconnect) und die **DATEV Online-APIs** (Cloud-Datenservices), das programmatischen Zugriff auf die deutsche Buchhaltungs- und Lohnabrechnungssoftware ermöglicht.

## 🚀 Features

- **Flexible Authentifizierung**: Basic Auth, Bearer Token und OAuth2 über austauschbare Authentication-Klassen
- **Domain-Driven Design**: Strikte Trennung zwischen API-Clients, Endpoints, Entities und Contracts
- **Über 120 Desktop-Endpoints** für umfassende DATEVconnect-Integration:
    - Buchhaltung (Accounting) - 34 Endpoints
    - Mandantenstammdaten (Client Master Data) - 19 Endpoints
    - Lohn & Gehalt (Payroll/HR) - 32 Endpoints
    - Dokumentenmanagement (DMS) - 11 Endpoints
    - Auftragsverwaltung (Order Management) - 21 Endpoints
    - Rechtswesen (Law) - 15 Endpoints
    - Öffentlicher Sektor (Public Sector) - 12 Endpoints
    - Identity & Access Management (SCIM) - 5 Endpoints
    - Diagnostics - 2 Endpoints
- **14 DATEV Online-Dienste (Cloud)** mit 111 Operationen vollständig abgedeckt:
    - accounting-clients, accounting:documents (Belegbilderservice), accounting:dxso-jobs, accounting:extf-files, Accounting Data Exchange (Buchungsdatenservice)
    - hr:exchange, hr:exports, hr:files, hr:payrollreports, hr:eau, Datenservice Dokumente Personalwirtschaft
    - cashregister:import (Kassenarchiv), Health-Endpunkte (master-data, my-tax)
- **Async-Job-Unterstützung** (202 + Location, State-Polling, mehrstufige Jobs) über einen konfigurierbaren `JobPoller`

## 📋 Voraussetzungen

- PHP 8.2, 8.3 oder 8.4
- DATEV Software mit aktivierter Desktop API (läuft standardmäßig auf Port 58452)
- Composer

## 📦 Installation

```bash
composer require daniel-jorg-schuppelius/datev-php-sdk
```

## ⚙️ Konfiguration

### Verbindung zur DATEV Desktop API

Die API läuft standardmäßig auf `https://127.0.0.1:58452`.

### Authentifizierung

**HTTP Basic Auth (empfohlen):**

```php
use APIToolkit\API\Authentication\BasicAuthentication;
use Datev\API\Desktop\Client;

$authentication = new BasicAuthentication('Benutzer', 'Passwort');
$client = new Client($authentication, 'https://127.0.0.1:58452');
```

**Bearer Token Auth:**

```php
use APIToolkit\API\Authentication\BearerAuthentication;
use Datev\API\Desktop\Client;

$authentication = new BearerAuthentication(
    'your-api-key',
    ['X-Datev-Client-ID' => 'your-client-id']
);
$client = new Client($authentication, 'https://127.0.0.1:58452');
```

## 📚 Verwendung

### Beispiel: Mandanten abrufen (Accounting)

```php
use APIToolkit\API\Authentication\BasicAuthentication;
use Datev\API\Desktop\Client;
use Datev\API\Desktop\Endpoints\Accounting\ClientsEndpoint;

$client = new Client(new BasicAuthentication('user', 'password'));
$endpoint = new ClientsEndpoint($client);

// Alle Mandanten abrufen
$clients = $endpoint->get();

// Einzelnen Mandanten abrufen
$singleClient = $endpoint->get(id: $clientId);
```

### Beispiel: Mitarbeiter abrufen (Payroll)

```php
use APIToolkit\API\Authentication\BasicAuthentication;
use Datev\API\Desktop\Client;
use Datev\API\Desktop\Endpoints\Payroll\EmployeesEndpoint;

$client = new Client(new BasicAuthentication('user', 'password'));
$endpoint = new EmployeesEndpoint($client);

// Mitarbeiter mit Referenzdatum abrufen (erforderlich für HR-Endpoints)
$employees = $endpoint->get(referenceDate: new DateTime('2024-01-01'));
```

### Beispiel: Echo-Test (Verbindung prüfen)

```php
use APIToolkit\API\Authentication\BasicAuthentication;
use Datev\API\Desktop\Client;
use Datev\API\Desktop\Endpoints\Diagnostics\EchoEndpoint;

$client = new Client(new BasicAuthentication('user', 'password'));
$echoEndpoint = new EchoEndpoint($client);

$response = $echoEndpoint->get();
```

## 🏗️ Projektstruktur

```
src/
├── API/
│   └── Desktop/
│       ├── Client.php              # API Client (unterstützt alle Auth-Typen)
│       └── Endpoints/
│           ├── Accounting/         # 34 Endpoints (accounting/v1)
│           ├── ClientMasterData/   # 19 Endpoints (master-data/v1)
│           ├── Diagnostics/        # 2 Endpoints (Echo & Domains)
│           ├── DocumentManagement/ # 11 Endpoints (dms/v2)
│           ├── IdentityAndAccessManagement/  # 5 Endpoints (SCIM)
│           ├── Law/                # 15 Endpoints (law/v1)
│           ├── OrderManagement/    # 21 Endpoints
│           ├── Payroll/            # 32 Endpoints (hr/v3)
│           └── PublicSector/       # 12 Endpoints (public-sector/v1)
├── Contracts/
│   ├── Abstracts/                  # Basis-Klassen
│   └── Interfaces/                 # Interface-Definitionen
├── Entities/                       # Domain-Entities
└── Enums/                          # Enumerations (20+ Typen)
```

## 🔌 API-Endpunkte

### Accounting (`accounting/v1`)

Buchungssätze, Kostenstellen, Konten, Kreditoren, Debitoren und mehr.

| Endpoint                                 | Beschreibung                                        |
| ---------------------------------------- | --------------------------------------------------- |
| `ClientsEndpoint`                        | Mandantenverwaltung                                 |
| `AccountingRecordsEndpoint`              | Buchungssätze                                       |
| `AccountingSequencesEndpoint`            | Buchungsstapel                                      |
| `GeneralLedgerAccountsEndpoint`          | Sachkonten                                          |
| `CreditorsEndpoint` / `DebitorsEndpoint` | Kreditoren & Debitoren                              |
| `CostCentersEndpoint`                    | Kostenstellen                                       |
| `FiscalYearsEndpoint`                    | Wirtschaftsjahre                                    |
| `TermsOfPaymentEndpoint`                 | Zahlungsbedingungen                                 |
| `PostingProposal*Endpoint`               | Buchungsvorschläge (Kasse, Ein-/Ausgangsrechnungen) |
| ... und 24 weitere                       |                                                     |

### Client Master Data (`master-data/v1`)

Mandantenstammdaten, Adressaten und Finanzämter.

| Endpoint                   | Beschreibung         |
| -------------------------- | -------------------- |
| `ClientsEndpoint`          | Mandantenstammdaten  |
| `AddresseesEndpoint`       | Adressatenverwaltung |
| `TaxAuthoritiesEndpoint`   | Finanzämter          |
| `BanksEndpoint`            | Bankverbindungen     |
| `LegalFormsEndpoint`       | Rechtsformen         |
| `ClientCategoriesEndpoint` | Mandantenkategorien  |
| `RelationshipsEndpoint`    | Beziehungen          |
| ... und 12 weitere         |                      |

### Payroll / HR (`hr/v3`)

Lohn- und Gehaltsabrechnung. **Hinweis:** Alle HR-Endpoints erfordern ein `reference-date`.

| Endpoint                      | Beschreibung          |
| ----------------------------- | --------------------- |
| `EmployeesEndpoint`           | Mitarbeiterverwaltung |
| `SalariesEndpoint`            | Gehälter              |
| `SocialInsuranceEndpoint`     | Sozialversicherung    |
| `TaxationEndpoint`            | Besteuerung           |
| `WorkingHoursEndpoint`        | Arbeitszeiten         |
| `VacationEntitlementEndpoint` | Urlaubsansprüche      |
| `GrossPaymentsEndpoint`       | Bruttobezüge          |
| ... und 25 weitere            |                       |

### Document Management (`dms/v2`)

Dokumentenverwaltung und Archivierung.

| Endpoint                 | Beschreibung          |
| ------------------------ | --------------------- |
| `DocumentsEndpoint`      | Dokumentverwaltung    |
| `DocumentFilesEndpoint`  | Dateien zu Dokumenten |
| `DocumentStatesEndpoint` | Dokumentstatus        |
| `DomainsEndpoint`        | Mandantenbereiche     |
| `StructureItemsEndpoint` | Ordnerstrukturen      |
| `SecureAreasEndpoint`    | Sicherheitsbereiche   |
| ... und 5 weitere        |                       |

### Order Management

Auftragsverwaltung mit Gebührenplanung.

| Endpoint                  | Beschreibung      |
| ------------------------- | ----------------- |
| `OrdersEndpoint`          | Aufträge          |
| `InvoicesEndpoint`        | Rechnungen        |
| `FeePlansEndpoint`        | Gebührenpläne     |
| `ChargeRatesEndpoint`     | Verrechnungssätze |
| `CostItemsEndpoint`       | Kostenträger      |
| `ExpensePostingsEndpoint` | Auslagenbuchungen |
| ... und 15 weitere        |                   |

### Law (`law/v1`)

Aktenverwaltung für Rechtsanwälte und Notare.

| Endpoint                | Beschreibung      |
| ----------------------- | ----------------- |
| `FilesEndpoint`         | Akten             |
| `ExpensesEndpoint`      | Auslagen          |
| `FeeVersionsEndpoint`   | Gebührenversionen |
| `CausesEndpoint`        | Fallursachen      |
| `PartyRolesEndpoint`    | Parteirollen      |
| `SecurityZonesEndpoint` | Sicherheitszonen  |
| ... und 9 weitere       |                   |

### Public Sector (`public-sector/v1`)

Kommunalverwaltung und öffentlicher Sektor.

| Endpoint                | Beschreibung     |
| ----------------------- | ---------------- |
| `CitizensEndpoint`      | Bürgerverwaltung |
| `MetersEndpoint`        | Zählerverwaltung |
| `MeterReadingsEndpoint` | Zählerablesungen |
| `NotificationsEndpoint` | Bescheide        |
| `DuesEndpoint`          | Gebühren         |
| `ConsumptionsEndpoint`  | Verbrauchsdaten  |
| ... und 6 weitere       |                  |

### Identity & Access Management (SCIM)

Benutzer- und Gruppenverwaltung nach SCIM-Standard.

| Endpoint                        | Beschreibung           |
| ------------------------------- | ---------------------- |
| `UsersEndpoint`                 | Benutzerverwaltung     |
| `GroupsEndpoint`                | Gruppenverwaltung      |
| `SchemasEndpoint`               | SCIM-Schemas           |
| `ResourceTypesEndpoint`         | Ressourcentypen        |
| `ServiceProviderConfigEndpoint` | Provider-Konfiguration |

### Diagnostics

Verbindungstests und Systemdiagnose.

| Endpoint          | Beschreibung       |
| ----------------- | ------------------ |
| `EchoEndpoint`    | Verbindungstest    |
| `DomainsEndpoint` | Verfügbare Domains |

## ☁️ DATEV Online-APIs (Cloud)

Neben der lokalen Desktop API deckt das SDK alle 14 DATEV-Online-Dienste vollständig ab (`src/API/Online/`). Jeder Dienst hat einen eigenen Host (`https://<service>.api.datev.de/platform[-sandbox]/vN`); die Dienstfakten (Host, Basispfad, Header-Schreibweise) kapselt das Enum `Datev\API\Online\OnlineService`.

### Client und Authentifizierung

Die Authentifizierung erfolgt per OAuth2-Bearer-Token plus `X-DATEV-Client-Id`-Header. Die Token-Beschaffung (Authorization Code Flow über login.datev.de) ist Sache des Aufrufers — das php-api-toolkit liefert dafür `OAuth2AuthorizationCodeGrant` und `OAuth2BearerAuthentication`.

```php
use APIToolkit\API\Authentication\BearerAuthentication;
use Datev\API\Online\{Client, OnlineService};

$client = new Client(
    OnlineService::AccountingClients,
    new BearerAuthentication($accessToken),
    'meine-datev-client-id',   // X-DATEV-Client-Id
    sandbox: true               // /platform-sandbox statt /platform
);

// ApiKey-only-Dienste (Kassenarchiv, Health-Endpunkte):
$cashClient = Client::forApiKey(OnlineService::CashRegister, $clientId, $clientSecret);
```

### Beispiel: Mandanten und Belegtransfer

```php
use Datev\API\Online\Endpoints\AccountingClients\ClientsEndpoint;
use Datev\API\Online\Endpoints\AccountingDocuments\DocumentsEndpoint;

// Mandantenliste inkl. freigeschalteter Datenservices (OData-Paging)
$clients = (new ClientsEndpoint($client))->searchPage(['top' => 100]);
echo $clients->getTotalItems();

// Beleg hochladen (Belegbilderservice, multipart)
$documents = new DocumentsEndpoint($documentsClient, '29098-55003');
$document = $documents->upload(
    file_get_contents('rechnung.pdf'),
    'rechnung.pdf',
    ['document_type' => 'Rechnungseingang', 'note' => 'Juli 2026']
);
```

### Beispiel: EXTF-Import mit Job-Polling

```php
use Datev\API\Online\Endpoints\AccountingExtfFiles\ExtfFilesEndpoint;
use Datev\Enums\Online\ExtfJobResult;

$extf = new ExtfFilesEndpoint($extfClient, '29098-100');   // Verbundnummer
$jobLocation = $extf->import($extfContent, 'EXTF_Buchungsstapel.csv');
$job = $extf->waitForImport($jobLocation);                  // pollt bis succeeded/failed

if ($job?->getResult() === ExtfJobResult::Failed) {
    echo $job->getValidationDetails()?->getDetail();
}
```

### Online-Dienste im Überblick

| Dienst (`OnlineService::…`)          | Endpoints                 | Besonderheiten                                       |
| ------------------------------------ | ------------------------- | ---------------------------------------------------- |
| `AccountingClients`                  | Mandanten + Datenservices | OData `top/skip/filter`, `Link`/`Total-Items`-Paging |
| `AccountingDocuments`                | Belegbilderservice        | Multipart-Uploads, stapled Documents                 |
| `AccountingDxsoJobs`                 | DXSO-Datentransfer        | create → addFile → finalize → Status/Protokoll       |
| `AccountingExtfFiles`                | EXTF-Import               | octet-stream + `Filename`-Header, 202 + Location     |
| `AccountingDataExchange`             | Buchungsdatenservice      | ndjson-Antworten, Header-Paging, Export-Jobs         |
| `CashRegister`                       | Kassenarchiv              | Tenant-Adressierung, ApiKey-only                     |
| `HrExchange`                         | Lohn-Datenaustausch       | Alle Writes 202-async, Lese-Jobs, RestHooks          |
| `HrExports`                          | Lohn-Auswertungsdaten     | Zeitraumfilter, Arbeitnehmer-/Mandantenebene         |
| `HrFiles`                            | Lohn-Importdateien        | Multipart ≤3 MB, Job-Status                          |
| `HrPayrollReports`                   | Auswertungs-PDFs          | PDF/ZIP-Download via Accept-Negotiation              |
| `HrEau`                              | eAU-Anfragen              | Verbundnummer + Personalnummer                       |
| `HrDocuments`                        | Personalakte-Dokumente    | Duale Adressierung (GUID/Verbundnummer)              |
| `MasterClientsHealth`, `MyTaxHealth` | Healthchecks              | ApiKey-only                                          |

Die Abdeckung lässt sich jederzeit prüfen: `php tools/OpenApiCoverageAnalyzer.php --type=Online`.

## 🧪 Tests

### Test-Konfiguration

1. Kopieren Sie `.samples/config.json.sample` nach `tests/.samples/config.json`
2. Tragen Sie Ihre DATEV-Zugangsdaten ein:

```json
{
    "DATEV-DESKTOP-API": [
        {
            "key": "resourceurl",
            "value": "https://127.0.0.1:58452"
        },
        {
            "key": "user",
            "value": "IhrBenutzer"
        },
        {
            "key": "password",
            "value": "IhrPasswort"
        }
    ]
}
```

### Tests ausführen

```bash
composer test
# oder
vendor/bin/phpunit

# Endpoint-Tests im Mock-Modus (ohne DATEV-Installation, inkl. aller Online-Dienste):
DATEV_SKIP_API_TESTS=0 DATEV_FORCE_MOCK=1 vendor/bin/phpunit
```

> **Hinweis:** Die Endpoint-Tests erfordern standardmäßig eine laufende DATEV-Installation und sind daher deaktiviert (`DATEV_SKIP_API_TESTS=1` in `phpunit.xml.dist`). Im Mock-Modus werden die Antworten aus den OpenAPI-Spezifikationen in `docs/OpenAPI/` generiert.
>
> **Online-Live-Tests:** Mit `DATEV_ONLINE_LIVE=1` und dem Abschnitt `DATEV-ONLINE-API` in `.samples/config.json` (Sandbox-Bearer-Token + DATEV-Client-Id) laufen die Online-Endpoint-Tests gegen die DATEV-Sandbox statt gegen Mocks.

## 📖 Abhängigkeiten

- [php-api-toolkit](https://github.com/daniel-jorg-schuppelius/php-api-toolkit) (^2.0) - Basis-Klassen für Clients, Endpoints und Entities
- [GuzzleHttp](https://github.com/guzzle/guzzle) - HTTP Client
- [PSR-3 Logger](https://www.php-fig.org/psr/psr-3/) - Logging-Interface

## 🔧 Tools

Das SDK enthält ein **OpenAPI Coverage Analyzer** Tool zur Analyse der API-Abdeckung:

```bash
php tools/OpenApiCoverageAnalyzer.php
```

Dokumentation: [docs/OpenApiCoverageAnalyzer.md](docs/OpenApiCoverageAnalyzer.md)

## 📄 Lizenz

Dieses Projekt ist unter der [MIT-Lizenz](LICENSE) lizenziert.

## 💖 Unterstützung

Wenn Ihnen dieses Projekt gefällt und es Ihnen bei Ihrer Arbeit hilft, würde ich mich sehr über eine Spende freuen!

[![GitHub Sponsors](https://img.shields.io/badge/Sponsor-GitHub-ea4aaa?logo=github)](https://github.com/sponsors/Daniel-Jorg-Schuppelius)
[![PayPal](https://img.shields.io/badge/Spenden-PayPal-blue?logo=paypal)](https://www.paypal.com/donate/?hosted_button_id=X43UQQVDKL76Y)

## 👤 Autor

**Daniel Jörg Schuppelius**

- Website: [schuppelius.org](https://schuppelius.org)
- E-Mail: info@schuppelius.org
