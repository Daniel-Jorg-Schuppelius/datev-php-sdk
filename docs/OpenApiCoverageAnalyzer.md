# OpenAPI Coverage Analyzer

Ein Tool zum Abgleich der OpenAPI-Spezifikationen mit den implementierten Endpoints im DATEV PHP SDK. Unterstützt sowohl **Desktop** als auch **Online** API-Typen.

### Verwendung

```bash
# Desktop API analysieren (Standard)
php tools/OpenApiCoverageAnalyzer.php

# Online API analysieren
php tools/OpenApiCoverageAnalyzer.php --type=Online

# Alle verfügbaren API-Typen analysieren
php tools/OpenApiCoverageAnalyzer.php --all

# Ergebnisse als JSON exportieren
php tools/OpenApiCoverageAnalyzer.php --json=coverage-report.json

# Ergebnisse als Markdown exportieren
php tools/OpenApiCoverageAnalyzer.php --md=coverage-report.md

# Alles kombinieren
php tools/OpenApiCoverageAnalyzer.php --all --json=coverage.json --md=coverage.md

# Hilfe anzeigen
php tools/OpenApiCoverageAnalyzer.php --help
```

### Kommandozeilen-Optionen

| Option | Beschreibung |
|--------|-------------|
| `--type=TYPE` | API-Typ analysieren (Desktop, Online). Standard: Desktop |
| `--all` | Alle verfügbaren API-Typen analysieren |
| `--json=FILE` | Ergebnisse als JSON exportieren |
| `--md=FILE` | Ergebnisse als Markdown exportieren |
| `--help` | Hilfe anzeigen |

### Features

- **Multi-API-Support**: Unterstützt Desktop und Online APIs
- **Automatische Erkennung**: Scannt alle OpenAPI-Dateien im `docs/OpenAPI/{Type}/` Verzeichnis
- **Endpoint-Analyse**: Analysiert alle PHP-Endpoint-Klassen im `src/API/{Type}/Endpoints/` Verzeichnis
- **Coverage-Berechnung**: Berechnet die Abdeckung basierend auf Ressourcen-Matching
- **Fehlende Implementierungen**: Identifiziert API-Pfade ohne entsprechende Endpoint-Implementierung
- **Export-Optionen**: JSON und Markdown Export für Dokumentation und CI/CD-Integration

### Output Beispiel

```
╔══════════════════════════════════════════════════════════════════════════════╗
║               DATEV PHP SDK - OpenAPI Coverage Analysis                      ║
╚══════════════════════════════════════════════════════════════════════════════╝

┌──────────────────────────────────────────────────────────────────────────────┐
│ ✅ Accounting
├──────────────────────────────────────────────────────────────────────────────┤
│ OpenAPI File:    Accounting-1.7.4.1.json
│ API Version:     1.7.4.1
│ Total Operations: 70
│ Endpoint Classes: 34
│ Resource Coverage: 31/31 (100%)
└──────────────────────────────────────────────────────────────────────────────┘
```

### Status-Icons

- ✅ Coverage ≥ 80%
- ⚠️ Coverage 50-79%
- ❌ Coverage < 50%

### Programmatische Verwendung

```php
<?php
require_once 'tools/OpenApiCoverageAnalyzer.php';

use Datev\Tools\OpenApiCoverageAnalyzer;

$analyzer = new OpenApiCoverageAnalyzer();
$results = $analyzer->analyze();

// Ergebnisse verarbeiten
foreach ($results as $domain => $data) {
    $coverage = $data['coverage']['resources']['percentage'];
    echo "{$domain}: {$coverage}% coverage\n";
}

// Oder Report ausgeben
$analyzer->printReport();
```

### Unterstützte Domains

- Accounting
- ClientMasterData
- Diagnostics
- DocumentManagement
- IdentityAndAccessManagement
- Law
- OrderManagement
- Payroll
- PublicSector

### Erweiterung für neue Domains

Um eine neue Domain hinzuzufügen, erweitern Sie das `$domainMapping` Array in der Klasse:

```php
private array $domainMapping = [
    'Neue Domain' => 'NeueDomain',
    // ... bestehende Mappings
];
```
