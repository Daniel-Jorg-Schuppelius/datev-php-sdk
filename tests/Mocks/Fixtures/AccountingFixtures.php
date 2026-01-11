<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingFixtures.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Mocks\Fixtures;

/**
 * Mock-Fixtures für Accounting Endpoints.
 */
class AccountingFixtures {
    public static function getClients(): array {
        return [
            [
                'id' => '12345',
                'consultant_number' => 12345,
                'client_number' => 1001,
                'name' => 'Musterfirma GmbH',
                'status' => 'active',
            ],
            [
                'id' => '12346',
                'consultant_number' => 12345,
                'client_number' => 1002,
                'name' => 'Beispiel AG',
                'status' => 'active',
            ],
        ];
    }

    public static function getClient(): array {
        return [
            'id' => '12345',
            'consultant_number' => 12345,
            'client_number' => 1001,
            'name' => 'Musterfirma GmbH',
            'status' => 'active',
        ];
    }

    public static function getAccountingRecords(): array {
        return [
            [
                'id' => 'rec-001',
                'document_date' => '2024-01-15',
                'posting_date' => '2024-01-15',
                'document_number' => 'RE-2024-001',
                'amount' => 1190.00,
                'tax_amount' => 190.00,
                'net_amount' => 1000.00,
                'debit_credit' => 'S',
                'account_number' => 8400,
            ],
            [
                'id' => 'rec-002',
                'document_date' => '2024-01-16',
                'posting_date' => '2024-01-16',
                'document_number' => 'RE-2024-002',
                'amount' => 595.00,
                'tax_amount' => 95.00,
                'net_amount' => 500.00,
                'debit_credit' => 'S',
                'account_number' => 8400,
            ],
        ];
    }

    public static function getAccountingRecord(): array {
        return [
            'id' => 'rec-001',
            'document_date' => '2024-01-15',
            'posting_date' => '2024-01-15',
            'document_number' => 'RE-2024-001',
            'amount' => 1190.00,
            'tax_amount' => 190.00,
            'net_amount' => 1000.00,
            'debit_credit' => 'S',
            'account_number' => 8400,
        ];
    }

    public static function getCostCenters(): array {
        return [
            [
                'id' => 'cc-001',
                'number' => 'KST-001',
                'name' => 'Verwaltung',
                'valid_from' => '2024-01-01',
            ],
            [
                'id' => 'cc-002',
                'number' => 'KST-002',
                'name' => 'Vertrieb',
                'valid_from' => '2024-01-01',
            ],
        ];
    }

    public static function getDebtors(): array {
        return [
            [
                'id' => 'deb-001',
                'account_number' => 10001,
                'name' => 'Kunde A GmbH',
                'balance' => 5000.00,
            ],
            [
                'id' => 'deb-002',
                'account_number' => 10002,
                'name' => 'Kunde B AG',
                'balance' => 3500.00,
            ],
        ];
    }

    public static function getCreditors(): array {
        return [
            [
                'id' => 'cred-001',
                'account_number' => 70001,
                'name' => 'Lieferant A GmbH',
                'balance' => -2500.00,
            ],
            [
                'id' => 'cred-002',
                'account_number' => 70002,
                'name' => 'Lieferant B AG',
                'balance' => -1800.00,
            ],
        ];
    }

    public static function getSequences(): array {
        return [
            [
                'id' => 'seq-001',
                'name' => 'Ausgangsrechnungen',
                'prefix' => 'AR',
                'current_number' => 2024001,
            ],
            [
                'id' => 'seq-002',
                'name' => 'Eingangsrechnungen',
                'prefix' => 'ER',
                'current_number' => 2024050,
            ],
        ];
    }

    public static function getEchoResponse(): array {
        return [
            'message' => 'Echo service is available',
            'timestamp' => date('c'),
        ];
    }

    public static function getGenericData(): array {
        return [
            'id' => 'generic-001',
            'status' => 'active',
        ];
    }

    public static function getGenericList(): array {
        return [
            [
                'id' => 'generic-001',
                'status' => 'active',
            ],
        ];
    }

    public static function getAllResponses(): array {
        return [
            // Clients
            'GET:/datev/api/accounting/v1/clients' => [
                'statusCode' => 200,
                'body' => self::getClients(),
            ],
            'GET:/datev/api/accounting/v1/clients/{id}' => [
                'statusCode' => 200,
                'body' => self::getClient(),
            ],
            'GET:/datev/api/accounting/v1/clients/*' => [
                'statusCode' => 200,
                'body' => self::getClient(),
            ],
            // Accounting Records
            'GET:/datev/api/accounting/v1/clients/*/accounting-records' => [
                'statusCode' => 200,
                'body' => self::getAccountingRecords(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/accounting-records/*' => [
                'statusCode' => 200,
                'body' => self::getAccountingRecords()[0],
            ],
            // Cost Centers (with fiscal year and cost system)
            'GET:/datev/api/accounting/v1/clients/*/cost-centers' => [
                'statusCode' => 200,
                'body' => self::getCostCenters(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/cost-centers/*' => [
                'statusCode' => 200,
                'body' => self::getCostCenters()[0],
            ],
            'GET:/datev/api/accounting/v1/clients/*/fiscal-years/*/cost-systems/*/cost-centers' => [
                'statusCode' => 200,
                'body' => self::getCostCenters(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/fiscal-years/*/cost-systems/*/cost-centers/*' => [
                'statusCode' => 200,
                'body' => self::getCostCenters()[0],
            ],
            // Debtors
            'GET:/datev/api/accounting/v1/clients/*/debtors' => [
                'statusCode' => 200,
                'body' => self::getDebtors(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/debtors/*' => [
                'statusCode' => 200,
                'body' => self::getDebtors()[0],
            ],
            'GET:/datev/api/accounting/v1/clients/*/debtors-next-available' => [
                'statusCode' => 200,
                'body' => ['next_available' => 10003],
            ],
            // Creditors
            'GET:/datev/api/accounting/v1/clients/*/creditors' => [
                'statusCode' => 200,
                'body' => self::getCreditors(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/creditors/*' => [
                'statusCode' => 200,
                'body' => self::getCreditors()[0],
            ],
            'GET:/datev/api/accounting/v1/clients/*/creditors-next-available' => [
                'statusCode' => 200,
                'body' => ['next_available' => 70003],
            ],
            // Sequences
            'GET:/datev/api/accounting/v1/clients/*/sequences' => [
                'statusCode' => 200,
                'body' => self::getSequences(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/sequences/*' => [
                'statusCode' => 200,
                'body' => self::getSequences()[0],
            ],
            'GET:/datev/api/accounting/v1/clients/*/sequences-processed' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            // Statistics
            'GET:/datev/api/accounting/v1/clients/*/statistics' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            // Sums and Balances
            'GET:/datev/api/accounting/v1/clients/*/sums-and-balances' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            // Transaction Keys
            'GET:/datev/api/accounting/v1/clients/*/transaction-keys' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            // Account Postings
            'GET:/datev/api/accounting/v1/clients/*/account-postings' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            // Accounts Payable/Receivable
            'GET:/datev/api/accounting/v1/clients/*/accounts-payable' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/accounts-payable-condense' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/accounts-receivable' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/accounts-receivable-condense' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            // Assets
            'GET:/datev/api/accounting/v1/clients/*/assets-stocktakings' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            // Cost Accounting
            'GET:/datev/api/accounting/v1/clients/*/cost-accounting-records' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/cost-center-properties' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/cost-sequences' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/cost-systems' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            // Fiscal Years
            'GET:/datev/api/accounting/v1/clients/*/fiscal-years' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/fiscal-years/*' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            // General Ledger Accounts
            'GET:/datev/api/accounting/v1/clients/*/general-ledger-accounts' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/general-ledger-accounts/*' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/general-ledger-accounts-utilized' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            // Internal Cost Services
            'GET:/datev/api/accounting/v1/clients/*/internal-cost-services' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            // Posting Proposals
            'GET:/datev/api/accounting/v1/clients/*/posting-proposal-rules-cash-register' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/posting-proposal-rules-incoming-invoices' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/posting-proposal-rules-outgoing-invoices' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'POST:/datev/api/accounting/v1/clients/*/posting-proposals-cash-register-batch' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            'POST:/datev/api/accounting/v1/clients/*/posting-proposals-incoming-invoices-batch' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            'POST:/datev/api/accounting/v1/clients/*/posting-proposals-outgoing-invoices-batch' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            // Terms of Payment
            'GET:/datev/api/accounting/v1/clients/*/terms-of-payment' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/terms-of-payment/*' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
            // Various Addresses
            'GET:/datev/api/accounting/v1/clients/*/various-addresses' => [
                'statusCode' => 200,
                'body' => self::getGenericList(),
            ],
            'GET:/datev/api/accounting/v1/clients/*/various-addresses/*' => [
                'statusCode' => 200,
                'body' => self::getGenericData(),
            ],
        ];
    }
}
