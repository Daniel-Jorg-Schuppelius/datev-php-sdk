# DATEV PHP SDK - AI Coding Assistant Instructions

## Architecture Overview

This is a **DATEV Desktop API SDK** for PHP that provides programmatic access to German accounting/payroll software. It follows a **domain-driven design** with strict separation between API clients, endpoints, entities, and contracts.

### Key Architectural Patterns

**API Client Hierarchy**: Two authentication modes exist in `src/API/Desktop/`:
- `Client.php` - Bearer token auth (`Authorization: Bearer + X-Datev-Client-ID`) 
- `ClientBasicAuth.php` - HTTP Basic auth (username/password) - most commonly used
- Both connect to localhost:58452 by default (DATEV Desktop installation)

**Domain Boundaries**: Three main functional areas with separate endpoints and entities:
- **Accounting** (`accounting/v1`) - clients, cost centers, records, sequences
- **ClientMasterData** (`master-data/v1`) - addressees, tax authorities, client details  
- **Payroll** (`hr/v3`) - requires `reference-date` parameter for all operations
- **DocumentManagement** (`dms/v2`) - domains, properties (currently empty/disabled)
- **Diagnostics** - echo endpoint for connection testing

**Entity Pattern**: All entities extend APIToolkit base classes:
- `NamedEntity` - for single objects with properties
- `NamedValues` - for collections, with `$valueClassName` pointing to single entity
- Custom ID classes inherit from `ID`, `GUID` with specific `entityName` properties
- DateTime handling via `DateTimeNamedValue` with `valid_from` support

**Endpoint Pattern**: All endpoints extend `EndpointAbstract`:
```php
protected string $endpointPrefix = 'accounting/v1';  // API version
protected string $endpoint = 'clients';              // Resource name  
// URL: /datev/api/{endpointPrefix}/{endpoint}
```

## Development Workflows

**Testing Setup**: 
- Copy `.samples/config.json.sample` to `tests/.samples/config.json`
- Configure DATEV Desktop API credentials (user/password for Basic Auth)
- Tests inherit from `EndpointTest` which auto-detects API availability via echo endpoint
- Most tests are marked `$this->apiDisabled = true` due to local DATEV dependency

**Run Tests**: `composer test` or `vendor/bin/phpunit`

**Entity Creation Pattern**:
1. Create ID class in `Entities/{Domain}/EntityName/EntityNameID.php`
2. Create entity class extending appropriate base (`NamedEntity`, etc.)
3. Create collection class extending `NamedValues` with `$valueClassName = EntityName::class`
4. Create endpoint in `API/Desktop/Endpoints/{Domain}/` extending `EndpointAbstract`

## Project-Specific Conventions

**Namespace Structure**: `Datev\{Layer}\{Domain}\{Entity}`
- Layers: `API`, `Entities`, `Enums`, `Contracts`
- Domains: `Accounting`, `ClientMasterData`, `Payroll`, etc.

**Special Entity Patterns**:
- Client entities have domain-specific variants (`Accounting\Clients\Client`, `Payroll\Clients\Client`)
- Common base classes in `Entities\Common\Clients\` for shared behavior
- Enum classes use backed enums with string values (PHP 8.1+)

**Error Handling**: 
- Endpoints return `null` for empty/404 responses
- Required parameters throw `InvalidArgumentException`
- API errors logged via PSR-3 logger passed through constructors

**Date Handling**: 
- Payroll endpoints require ISO date format: `YYYY-MM-DD` 
- Use `DateTime` objects internally, format for API calls
- `reference-date` is mandatory for HR endpoints

## Integration Points

**External Dependencies**:
- **APIToolkit** (`daniel-jorg-schuppelius/php-api-toolkit`) - base classes for clients/endpoints/entities
- **GuzzleHttp** - HTTP client with 120s timeout, SSL verification disabled for localhost
- **ConfigToolkit** - test configuration management
- **ERRORToolkit** - logging factories and registry

**DATEV Desktop Integration**:
- Requires DATEV software running locally on port 58452
- API supports versioned endpoints (`v1`, `v2`, `v3`)
- Uses consultant_number for client identification
- Expand parameter controls response detail level (`expand=all` common)

## Key Files for Context
- [`src/API/Desktop/ClientBasicAuth.php`](src/API/Desktop/ClientBasicAuth.php) - Primary API client
- [`src/Contracts/Abstracts/API/Desktop/EndpointAbstract.php`](src/Contracts/Abstracts/API/Desktop/EndpointAbstract.php) - Base endpoint URL pattern
- [`tests/TestAPIClientFactory.php`](tests/TestAPIClientFactory.php) - Test client configuration
- [`.samples/config.json.sample`](.samples/config.json.sample) - Configuration template
- [`src/Enums/`](src/Enums/) - Domain-specific enumerations for DATEV business logic