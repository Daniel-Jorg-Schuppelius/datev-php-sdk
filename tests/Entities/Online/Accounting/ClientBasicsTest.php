<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientBasicsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Online\Accounting;

use Datev\Entities\Online\Accounting\Clients\{BasicAccountingInformation, ClientBasics, Clients};
use Tests\Contracts\EntityTest;

class ClientBasicsTest extends EntityTest {
    private const SPEC_EXAMPLE = [
        'client_number' => 55003,
        'consultant_number' => 29098,
        'id' => '29098-55003',
        'name' => 'Muster GmbH',
        'is_document_management_available' => true,
        'basic_accounting_information' => [
            [
                'fiscal_year_start' => '2026-01-01',
                'fiscal_year_end' => '2026-12-31',
                'account_length' => 4,
                'datev_chart_of_accounts' => 3,
                'ledgers' => [
                    'is_accounts_payable_ledger_available' => true,
                    'is_accounts_receivable_ledger_available' => true,
                    'is_cash_ledger_available' => false,
                ],
            ],
        ],
    ];

    public function test_from_json_with_nested_structures(): void {
        $client = ClientBasics::fromJson(json_encode(self::SPEC_EXAMPLE));

        $this->assertSame('29098-55003', $client->getId());
        $this->assertSame('Muster GmbH', $client->getName());
        $this->assertTrue($client->isDocumentManagementAvailable());

        $info = $client->getBasicAccountingInformation();
        $this->assertNotNull($info);
        $this->assertSame(1, $info->count());

        $first = $info->getFirstValue();
        $this->assertInstanceOf(BasicAccountingInformation::class, $first);
        $this->assertSame(4, $first->getAccountLength());
        $this->assertSame('2026-01-01', $first->getFiscalYearStart());

        $ledgers = $first->getLedgers();
        $this->assertNotNull($ledgers);
        $this->assertTrue($ledgers->isAccountsPayableLedgerAvailable());
        $this->assertFalse($ledgers->isCashLedgerAvailable());
    }

    public function test_clients_collection(): void {
        $clients = Clients::fromJson(json_encode([
            ['client_number' => 1, 'consultant_number' => 2, 'id' => '2-1', 'name' => 'A'],
        ]));

        $this->assertSame(1, $clients->count());
        $this->assertSame('2-1', $clients->getFirstValue()->getConsultantClientNumber()?->toString());
    }
}
