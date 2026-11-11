<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OpenItemsOfflineTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\Accounting\{AccountsPayableEndpoint, AccountsReceivableEndpoint};
use Datev\Entities\Accounting\AccountsPayable\{AccountPayable, AccountsPayable};
use Datev\Entities\Accounting\AccountsReceivable\{AccountReceivable, AccountsReceivable};
use Datev\Enums\{BalanceType, DebitCredit, EvidenceType};
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use Tests\Mocks\MockClient;

/**
 * Offene Posten verwarfen Betrag, Konto, Beleg und Mahnstufe, weil die Endpunkte
 * nur das eingebettete Open-Item-Schema der Buchungen kannten.
 */
final class OpenItemsOfflineTest extends TestCase {
    private const BASE = '/datev/api/accounting/v1/clients/12345-6/fiscal-years/20240101';

    /**
     * @return array<string, mixed>
     */
    private function item(): array {
        return [
            'id' => '20240101_3',
            'account_number' => 10000,
            'contra_account_number' => 8400,
            'amount_debit' => 119.0,
            'amount_credit' => 0.0,
            'open_balance_of_item' => 119.0,
            'currency_code' => 'EUR',
            'date' => '2024-01-15T00:00:00+01:00',
            'due_date' => '2024-02-14T00:00:00+01:00',
            'document_field1' => 'RE-2024-0001',
            'document_link' => 'BEDI "CB6A8F8F-099A-B3A9-2BAA-0CB64E299BA0"',
            'debit_credit_identifier' => 'S',
            'evidence_type' => 'invoice',
            'is_cleared' => false,
        ];
    }

    public function test_receivables_keep_amount_account_document_and_dunning_level(): void {
        $client = new MockClient;
        $client->registerMockResponse('GET', self::BASE . '/accounts-receivable', 200, [
            $this->item() + ['dunning_level' => '2', 'balance_type' => 'manual_clearing'],
        ]);

        $endpoint = new AccountsReceivableEndpoint($client, new NullLogger);
        $endpoint->setClientId(new ID('12345-6'));
        $endpoint->setFiscalYearId(new ID('20240101'));

        $items = $endpoint->search();

        $this->assertInstanceOf(AccountsReceivable::class, $items);
        $item = $items->getValues()[0];
        $this->assertInstanceOf(AccountReceivable::class, $item);
        $this->assertSame('20240101_3', $item->getID()?->getValue());

        $data = $item->toArray();
        $this->assertSame(10000, $data['account_number']);
        $this->assertSame(119.0, $data['amount_debit']);
        $this->assertSame(119.0, $data['open_balance_of_item']);
        $this->assertSame('RE-2024-0001', $data['document_field1']);
        $this->assertSame('BEDI "CB6A8F8F-099A-B3A9-2BAA-0CB64E299BA0"', $data['document_link']);
        $this->assertSame('2', $data['dunning_level']);
        $this->assertSame(BalanceType::ManualClearing->value, $data['balance_type']);
        $this->assertSame(DebitCredit::Debit->value, $data['debit_credit_identifier']);
        $this->assertSame(EvidenceType::Invoice->value, $data['evidence_type']);
    }

    public function test_payable_by_id_keeps_its_fields(): void {
        $client = new MockClient;
        $client->registerMockResponse('GET', self::BASE . '/accounts-payable/20240101_3', 200,
            $this->item() + ['balancing_type' => 'zero_balance_run']);

        $endpoint = new AccountsPayableEndpoint($client, new NullLogger);
        $endpoint->setClientId(new ID('12345-6'));
        $endpoint->setFiscalYearId(new ID('20240101'));

        $item = $endpoint->getById('20240101_3');

        $this->assertInstanceOf(AccountPayable::class, $item);
        $data = $item->toArray();
        $this->assertSame(10000, $data['account_number']);
        $this->assertSame('RE-2024-0001', $data['document_field1']);
        $this->assertSame(BalanceType::ZeroBalanceRun->value, $data['balancing_type']);
    }

    public function test_condensed_payables_use_the_payable_entity(): void {
        $client = new MockClient;
        $client->registerMockResponse('GET', self::BASE . '/accounts-payable/condense', 200, [$this->item()]);

        $endpoint = new AccountsPayableEndpoint($client, new NullLogger);
        $endpoint->setClientId(new ID('12345-6'));
        $endpoint->setFiscalYearId(new ID('20240101'));

        $items = $endpoint->searchCondensed();

        $this->assertInstanceOf(AccountsPayable::class, $items);
        $this->assertInstanceOf(AccountPayable::class, $items->getValues()[0]);
    }
}
