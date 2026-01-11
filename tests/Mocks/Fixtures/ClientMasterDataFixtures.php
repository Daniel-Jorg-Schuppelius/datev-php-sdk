<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientMasterDataFixtures.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Mocks\Fixtures;

/**
 * Mock-Fixtures für ClientMasterData Endpoints.
 * Struktur entspricht der echten DATEV API Antwort.
 */
class ClientMasterDataFixtures {
    public static function getClients(): array {
        return [
            self::getClient(),
            [
                'id' => '550e8400-e29b-41d4-a716-446655440001',
                'name' => 'Beispiel AG',
                'number' => 1002,
                'client_since' => '2020-06-01',
                'status' => 'active',
                'type' => 'legal_person',
                'functional_area_id' => 'fa-001',
            ],
        ];
    }

    public static function getClient(): array {
        return [
            'id' => '550e8400-e29b-41d4-a716-446655440000',
            'name' => 'Musterfirma GmbH',
            'number' => 1001,
            'client_since' => '2019-01-01',
            'status' => 'active',
            'type' => 'legal_person',
            'functional_area_id' => 'fa-001',
            'functional_area_name' => 'Steuerberatung',
            'organization_id' => 'org-001',
            'organization_name' => 'Hauptorganisation',
            'organization_number' => 1,
        ];
    }

    public static function getAddressees(): array {
        return [
            [
                'id' => 'addr-001',
                'type' => 'company',
                'name' => 'Musterfirma GmbH',
                'street' => 'Musterstraße 1',
                'postal_code' => '12345',
                'city' => 'Musterstadt',
                'country' => 'DE',
            ],
            [
                'id' => 'addr-002',
                'type' => 'person',
                'first_name' => 'Max',
                'last_name' => 'Mustermann',
                'street' => 'Beispielweg 42',
                'postal_code' => '54321',
                'city' => 'Beispielstadt',
                'country' => 'DE',
            ],
        ];
    }

    public static function getAddressee(): array {
        return [
            'id' => 'addr-001',
            'type' => 'company',
            'name' => 'Musterfirma GmbH',
            'street' => 'Musterstraße 1',
            'postal_code' => '12345',
            'city' => 'Musterstadt',
            'country' => 'DE',
        ];
    }

    public static function getTaxAuthorities(): array {
        return [
            [
                'id' => 'ta-001',
                'code' => '9203',
                'name' => 'Finanzamt Musterstadt',
                'street' => 'Steuerstraße 1',
                'postal_code' => '12345',
                'city' => 'Musterstadt',
            ],
            [
                'id' => 'ta-002',
                'code' => '9204',
                'name' => 'Finanzamt Beispielstadt',
                'street' => 'Finanzweg 10',
                'postal_code' => '54321',
                'city' => 'Beispielstadt',
            ],
        ];
    }

    public static function getLegalForms(): array {
        return [
            ['id' => 'lf-001', 'code' => 'GmbH', 'name' => 'Gesellschaft mit beschränkter Haftung'],
            ['id' => 'lf-002', 'code' => 'AG', 'name' => 'Aktiengesellschaft'],
            ['id' => 'lf-003', 'code' => 'e.K.', 'name' => 'eingetragener Kaufmann'],
            ['id' => 'lf-004', 'code' => 'OHG', 'name' => 'Offene Handelsgesellschaft'],
            ['id' => 'lf-005', 'code' => 'KG', 'name' => 'Kommanditgesellschaft'],
        ];
    }

    public static function getCountryCodes(): array {
        return [
            ['id' => 'cc-DE', 'code' => 'DE', 'name' => 'Deutschland'],
            ['id' => 'cc-AT', 'code' => 'AT', 'name' => 'Österreich'],
            ['id' => 'cc-CH', 'code' => 'CH', 'name' => 'Schweiz'],
            ['id' => 'cc-FR', 'code' => 'FR', 'name' => 'Frankreich'],
            ['id' => 'cc-NL', 'code' => 'NL', 'name' => 'Niederlande'],
        ];
    }

    public static function getClientGroups(): array {
        return [
            ['id' => 'cg-001', 'name' => 'Gruppe A', 'description' => 'Hauptkunden'],
            ['id' => 'cg-002', 'name' => 'Gruppe B', 'description' => 'Nebenkunden'],
        ];
    }

    public static function getRelationships(): array {
        return [
            [
                'id' => 'rel-001',
                'type' => 'parent_company',
                'source_id' => 'addr-001',
                'target_id' => 'addr-002',
            ],
        ];
    }

    public static function getResponsibilities(): array {
        return [
            [
                'id' => 'resp-001',
                'employee_id' => 'emp-001',
                'client_id' => 'cmd-12345',
                'role' => 'Steuerberater',
            ],
        ];
    }

    public static function getVersion(): array {
        return [
            'version' => '1.0.0',
            'build' => '2024.01.15',
            'api_version' => 'v1',
        ];
    }

    public static function getEmployees(): array {
        return [
            [
                'id' => 'kanzlei-emp-001',
                'first_name' => 'Anna',
                'last_name' => 'Berater',
                'role' => 'Steuerberater',
            ],
            [
                'id' => 'kanzlei-emp-002',
                'first_name' => 'Klaus',
                'last_name' => 'Prüfer',
                'role' => 'Wirtschaftsprüfer',
            ],
        ];
    }

    public static function getAllResponses(): array {
        return [
            'GET:/datev/api/master-data/v1/clients' => [
                'statusCode' => 200,
                'body' => self::getClients(),
            ],
            'GET:/datev/api/master-data/v1/clients/{id}' => [
                'statusCode' => 200,
                'body' => self::getClient(),
            ],
            'GET:/datev/api/master-data/v1/clients/*/addressees' => [
                'statusCode' => 200,
                'body' => self::getAddressees(),
            ],
            'GET:/datev/api/master-data/v1/addressees' => [
                'statusCode' => 200,
                'body' => self::getAddressees(),
            ],
            'GET:/datev/api/master-data/v1/addressees/*' => [
                'statusCode' => 200,
                'body' => self::getAddressee(),
            ],
            'GET:/datev/api/master-data/v1/tax-authorities' => [
                'statusCode' => 200,
                'body' => self::getTaxAuthorities(),
            ],
            'GET:/datev/api/master-data/v1/legal-forms' => [
                'statusCode' => 200,
                'body' => self::getLegalForms(),
            ],
            'GET:/datev/api/master-data/v1/country-codes' => [
                'statusCode' => 200,
                'body' => self::getCountryCodes(),
            ],
            'GET:/datev/api/master-data/v1/client-groups' => [
                'statusCode' => 200,
                'body' => self::getClientGroups(),
            ],
            'GET:/datev/api/master-data/v1/relationships' => [
                'statusCode' => 200,
                'body' => self::getRelationships(),
            ],
            'GET:/datev/api/master-data/v1/responsibilities' => [
                'statusCode' => 200,
                'body' => self::getResponsibilities(),
            ],
            'GET:/datev/api/master-data/v1/version' => [
                'statusCode' => 200,
                'body' => self::getVersion(),
            ],
            'GET:/datev/api/master-data/v1/employees' => [
                'statusCode' => 200,
                'body' => self::getEmployees(),
            ],
        ];
    }
}
