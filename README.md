# DATEV PHP SDK

[![PHP Version](https://img.shields.io/badge/php-%5E8.2%20%7C%7C%20%5E8.3-blue)](https://php.net)
[![License](https://img.shields.io/badge/license-MIT-green)](LICENSE)

Ein PHP SDK für die **DATEV Desktop API**, das programmatischen Zugriff auf die deutsche Buchhaltungs- und Lohnabrechnungssoftware ermöglicht.

## 🚀 Features

- **Zwei Authentifizierungsmodi**: Bearer Token und HTTP Basic Auth
- **Domain-Driven Design**: Strikte Trennung zwischen API-Clients, Endpoints, Entities und Contracts
- **Umfassende API-Abdeckung** für verschiedene DATEV-Bereiche:
  - Buchhaltung (Accounting)
  - Mandantenstammdaten (Client Master Data)
  - Lohn & Gehalt (Payroll/HR)
  - Dokumentenmanagement
  - Auftragsverwaltung (Order Management)
  - Rechtswesen (Law)
  - Öffentlicher Sektor (Public Sector)
  - Identity & Access Management
  - Diagnostics

## 📋 Voraussetzungen

- PHP 8.2 oder höher
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
use Datev\API\Desktop\ClientBasicAuth;

$client = new ClientBasicAuth(
    username: 'Benutzer',
    password: 'password',
    baseUrl: 'https://127.0.0.1:58452'
);
```

**Bearer Token Auth:**
```php
use Datev\API\Desktop\Client;

$client = new Client(
    apiKey: 'your-api-key',
    clientID: 'your-client-id',
    baseUrl: 'https://127.0.0.1:58452'
);
```

## 📚 Verwendung

### Beispiel: Mandanten abrufen (Accounting)

```php
use Datev\API\Desktop\ClientBasicAuth;
use Datev\API\Desktop\Endpoints\Accounting\ClientsEndpoint;

$client = new ClientBasicAuth('user', 'password');
$endpoint = new ClientsEndpoint($client);

// Alle Mandanten abrufen
$clients = $endpoint->get();

// Einzelnen Mandanten abrufen
$singleClient = $endpoint->get(id: $clientId);
```

### Beispiel: Mitarbeiter abrufen (Payroll)

```php
use Datev\API\Desktop\ClientBasicAuth;
use Datev\API\Desktop\Endpoints\Payroll\EmployeesEndpoint;

$client = new ClientBasicAuth('user', 'password');
$endpoint = new EmployeesEndpoint($client);

// Mitarbeiter mit Referenzdatum abrufen (erforderlich für HR-Endpoints)
$employees = $endpoint->get(referenceDate: new DateTime('2024-01-01'));
```

### Beispiel: Echo-Test (Verbindung prüfen)

```php
use Datev\API\Desktop\ClientBasicAuth;
use Datev\API\Desktop\Endpoints\Diagnostics\EchoEndpoint;

$client = new ClientBasicAuth('user', 'password');
$echoEndpoint = new EchoEndpoint($client);

$response = $echoEndpoint->get();
```

## 🏗️ Projektstruktur

```
src/
├── API/
│   └── Desktop/
│       ├── Client.php              # Bearer Token Auth
│       ├── ClientBasicAuth.php     # HTTP Basic Auth
│       └── Endpoints/
│           ├── Accounting/         # accounting/v1
│           ├── ClientMasterData/   # master-data/v1
│           ├── Diagnostics/        # Echo & Domain-Checks
│           ├── DocumentManagement/ # dms/v2
│           ├── IdentityAndAccessManagement/  # SCIM
│           ├── Law/                # law/v1
│           ├── OrderManagement/    # Auftragsverwaltung
│           ├── Payroll/            # hr/v3
│           └── PublicSector/       # public-sector/v1
├── Contracts/
│   ├── Abstracts/                  # Basis-Klassen
│   └── Interfaces/                 # Interface-Definitionen
├── Entities/                       # Domain-Entities
└── Enums/                          # Enumerations
```

## 🔌 API-Endpunkte

| Domain | Prefix | Beschreibung |
|--------|--------|--------------|
| Accounting | `accounting/v1` | Buchungssätze, Kostenstellen, Konten, etc. |
| Client Master Data | `master-data/v1` | Adressaten, Mandantenstammdaten, Finanzämter |
| Payroll | `hr/v3` | Mitarbeiter, Gehälter, Sozialversicherung |
| Document Management | `dms/v2` | Dokumente, Domains, Eigenschaften |
| Identity & Access | SCIM | Benutzer, Gruppen, Schemas |
| Law | `law/v1` | Akten, Gebühren, Auslagen |
| Order Management | - | Aufträge, Rechnungen, Gebührenpläne |
| Public Sector | `public-sector/v1` | Bürger, Bescheide, Zähler |
| Diagnostics | - | Echo-Endpoint für Verbindungstests |

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
```

> **Hinweis:** Die meisten Tests erfordern eine laufende DATEV-Installation und sind daher standardmäßig deaktiviert.

## 📖 Abhängigkeiten

- [php-api-toolkit](https://github.com/daniel-jorg-schuppelius/php-api-toolkit) - Basis-Klassen für Clients, Endpoints und Entities
- [GuzzleHttp](https://github.com/guzzle/guzzle) - HTTP Client
- [PSR-3 Logger](https://www.php-fig.org/psr/psr-3/) - Logging-Interface

## 📄 Lizenz

Dieses Projekt ist unter der [MIT-Lizenz](LICENSE) lizenziert.

## 👤 Autor

**Daniel Jörg Schuppelius**
- Website: [schuppelius.org](https://schuppelius.org)
- E-Mail: info@schuppelius.org