# Mock-System für Endpoint-Tests

Das DATEV PHP SDK enthält ein vollständiges Mock-System für Offline-Tests der API-Endpoints. Dies ermöglicht das Testen ohne eine laufende DATEV Desktop-Installation.

## Übersicht

Das Mock-System besteht aus folgenden Komponenten:

- **MockClient** (`tests/Mocks/MockClient.php`) - Der Haupt-Mock-Client, der das `ApiClientInterface` implementiert
- **MockDataLoader** (`tests/Mocks/MockDataLoader.php`) - Lädt und registriert Mock-Daten
- **Fixtures** (`tests/Mocks/Fixtures/`) - Vordefinierte Mock-Antworten für verschiedene Domains
- **MockEndpointTest** (`tests/Contracts/MockEndpointTest.php`) - Basis-Testklasse für Mock-basierte Tests

## Verwendung

### 1. Einfache Nutzung mit MockClient

```php
use Tests\Mocks\MockClient;

$mockClient = new MockClient();

// Mock-Response registrieren
$mockClient->registerMockResponse(
    'GET',
    '/datev/api/accounting/v1/clients',
    200,
    ['id' => '12345', 'name' => 'Musterfirma GmbH']
);

// Request ausführen
$response = $mockClient->get('/datev/api/accounting/v1/clients');
$data = json_decode($response->getBody()->getContents(), true);
```

### 2. Vollständig konfigurierter MockClient

```php
use Tests\Mocks\MockDataLoader;

// Client mit allen vordefinierten Fixtures
$mockClient = MockDataLoader::createFullyConfiguredMockClient();

// Alle Standard-Endpoints sind jetzt verfügbar
$response = $mockClient->get('/datev/api/echo');
$response = $mockClient->get('/datev/api/accounting/v1/clients');
$response = $mockClient->get('/datev/api/hr/v3/clients');
```

### 3. Domain-spezifischer MockClient

```php
use Tests\Mocks\MockDataLoader;

// Nur Accounting-Fixtures laden
$mockClient = MockDataLoader::createMockClientForDomain('accounting');

// Verfügbare Domains: 'diagnostics', 'accounting', 'clientmasterdata', 'payroll', 'hr'
```

### 4. Mock-Modus in Tests aktivieren

```php
use Tests\TestAPIClientFactory;

// Mock-Modus aktivieren
TestAPIClientFactory::enableMock();

// Jetzt gibt getClient() den MockClient zurück
$client = TestAPIClientFactory::getClient();

// Nach dem Test zurücksetzen
TestAPIClientFactory::reset();
```

### 5. Eigene Mock-Endpoint-Tests schreiben

```php
use Tests\Contracts\MockEndpointTest;

class MyMockTest extends MockEndpointTest {
    protected function getDomain(): string {
        return 'accounting';
    }

    public function testMyEndpoint(): void {
        // Zusätzliche Mock-Response registrieren
        $this->registerMockResponse(
            'GET',
            '/datev/api/custom/endpoint',
            200,
            ['custom' => 'data']
        );

        // Test durchführen...
        
        // Prüfen, ob Request gemacht wurde
        $this->assertRequestWasMade('GET', '/datev/api/custom/endpoint');
    }
}
```

## URL-Matching

Der MockClient unterstützt verschiedene Matching-Patterns:

| Pattern | Beschreibung | Beispiel |
|---------|--------------|----------|
| Exakt | Exakter URL-Match | `/datev/api/clients` |
| `*` | Wildcard für beliebige Zeichen | `/datev/api/clients/*/records` |
| `{id}` | Platzhalter für IDs | `/datev/api/clients/{id}` |
| `{guid}` | Platzhalter für GUIDs | `/datev/api/items/{guid}` |

## Request-Recording

Der MockClient zeichnet alle Requests auf:

```php
// Alle aufgezeichneten Requests abrufen
$requests = $mockClient->getRecordedRequests();

foreach ($requests as $request) {
    echo $request['method'];    // GET, POST, etc.
    echo $request['uri'];       // Die aufgerufene URI
    echo $request['timestamp']; // Zeitstempel
}

// Aufzeichnungen löschen
$mockClient->clearRecordedRequests();
```

## Fixtures

### AccountingFixtures

- `getClients()` - Liste von Mandanten
- `getAccountingRecords()` - Buchungssätze
- `getCostCenters()` - Kostenstellen
- `getDebtors()` - Debitoren
- `getCreditors()` - Kreditoren
- `getSequences()` - Nummernkreise

### ClientMasterDataFixtures

- `getClients()` - Mandanten-Stammdaten
- `getAddressees()` - Adressaten
- `getTaxAuthorities()` - Finanzämter
- `getLegalForms()` - Rechtsformen
- `getCountryCodes()` - Ländercodes

### PayrollFixtures

- `getClients()` - Lohnabrechnungsmandanten
- `getEmployees()` - Mitarbeiter
- `getSalaryComponents()` - Gehaltsbestandteile
- `getWorkingHours()` - Arbeitszeiten
- `getAbsences()` - Abwesenheiten

### DiagnosticsFixtures

- `getEcho()` - Echo-Endpoint-Antwort

## Eigene Fixtures erstellen

Erstellen Sie eine neue Fixture-Klasse in `tests/Mocks/Fixtures/`:

```php
namespace Tests\Mocks\Fixtures;

class CustomFixtures {
    public static function getItems(): array {
        return [
            ['id' => '1', 'name' => 'Item 1'],
            ['id' => '2', 'name' => 'Item 2'],
        ];
    }

    public static function getAllResponses(): array {
        return [
            'GET:/datev/api/custom/items' => [
                'statusCode' => 200,
                'body' => self::getItems(),
            ],
        ];
    }
}
```

## JSON-Fixture-Dateien

Mock-Daten können auch aus JSON-Dateien geladen werden:

```php
// Aus Datei laden
$mockClient->loadMockDataFromFile('tests/Mocks/data/custom.json');

// Oder alle JSON-Dateien im data-Verzeichnis laden
MockDataLoader::registerFromJsonFiles($mockClient);
```

JSON-Datei-Format:

```json
{
    "GET:/datev/api/custom/endpoint": {
        "statusCode": 200,
        "body": {
            "id": "123",
            "name": "Test"
        }
    }
}
```

## Best Practices

1. **Verwenden Sie `MockEndpointTest`** für neue Mock-basierte Tests
2. **Domain-spezifische Clients** verwenden, um nur relevante Fixtures zu laden
3. **Request-Recording** nutzen, um zu verifizieren, dass die richtigen Endpoints aufgerufen werden
4. **Reset nach Tests**: Rufen Sie `$mockClient->reset()` oder `TestAPIClientFactory::reset()` auf
5. **Realistische Fixtures**: Verwenden Sie Datenstrukturen, die der echten API entsprechen
