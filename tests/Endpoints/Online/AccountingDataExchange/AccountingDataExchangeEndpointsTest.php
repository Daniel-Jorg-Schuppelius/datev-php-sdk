<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingDataExchangeEndpointsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Online\AccountingDataExchange;

use Datev\API\Online\Endpoints\AccountingDataExchange\{
    AccountPostingsEndpoint,
    AccountPostingsJobsEndpoint,
    AccountingSequencesEndpoint,
    AgriculturalFinancialStatementEndpoint,
    FiscalYearsEndpoint,
    GeneralLedgerAccountsEndpoint,
    JobsEndpoint,
    SumsAndBalancesEndpoint,
    SumsAndBalancesQuantityAndWeightEndpoint,
    SumsAndBalancesQuantityAndWeightJobsEndpoint,
    TermsOfPaymentEndpoint
};
use Datev\API\Online\OnlineService;
use Datev\API\Online\Support\JobPoller;
use Datev\Entities\Online\AccountingDataExchange\FiscalYears\{FiscalYear, FiscalYears};
use Datev\Enums\Online\{DataExchangeJobState, DataExchangeRecordType};
use Tests\Contracts\OnlineEndpointTest;

class AccountingDataExchangeEndpointsTest extends OnlineEndpointTest {
    private const CLIENT_ID = 'f81d4fae-7dec-11d0-a765-00a0c91e6bf6';

    private const FISCAL_YEAR_ID = '2026-01-01';

    private const JOB_ID = 'aaaa1111-2222-3333-4444-555566667777';

    protected function getService(): OnlineService {
        return OnlineService::AccountingDataExchange;
    }

    private function fiscalYearBase(): string {
        return 'clients/' . self::CLIENT_ID . '/fiscal-years/' . self::FISCAL_YEAR_ID;
    }

    public function test_search_fiscal_years_ndjson(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $ndjson = json_encode(['accountLength' => 4, 'yearBegin' => '2026-01-01', 'yearEnd' => '2026-12-31', 'isInvoiceDateCheckOn' => true])
            . "\n"
            . json_encode(['accountLength' => 4, 'yearBegin' => '2025-01-01', 'yearEnd' => '2025-12-31', 'isInvoiceDateCheckOn' => false]);

        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/fiscal-years', 200, $ndjson, ['Content-Type' => 'application/x-ndjson']);

        $endpoint = new FiscalYearsEndpoint($this->client, self::CLIENT_ID);
        $years = $endpoint->search();

        $this->assertInstanceOf(FiscalYears::class, $years);
        $this->assertSame(2, $years->count());
        $first = $years->getFirstValue();
        $this->assertNotNull($first);
        $this->assertSame(4, $first->getAccountLength());
        $this->assertTrue($first->isInvoiceDateCheckOn());
    }

    public function test_get_fiscal_year(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse(
            'GET',
            $this->fiscalYearBase(),
            200,
            json_encode(['accountLength' => 6, 'yearBegin' => self::FISCAL_YEAR_ID]),
            ['Content-Type' => 'application/x-ndjson']
        );

        $endpoint = new FiscalYearsEndpoint($this->client, self::CLIENT_ID);
        $year = $endpoint->get(self::FISCAL_YEAR_ID);

        $this->assertInstanceOf(FiscalYear::class, $year);
        $this->assertSame(6, $year->getAccountLength());
    }

    public function test_account_postings_job_flow(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('POST', $this->fiscalYearBase() . '/account-postings?documentLinks=true', 202, ['jobId' => self::JOB_ID]);
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/jobs/' . self::JOB_ID . '/state', 200, ['jobState' => 'COMPLETED']);

        $ndjson = json_encode([
            'accountNumber' => 10000, 'amountDebit' => 119.0, 'currencyCode' => 'EUR',
            'recordType' => 'financial_accounting', 'postingDescription' => 'Testbuchung',
            'documentLink' => ['sourceSystem' => 'duo', 'documentGuid' => 'abc-123'],
        ]);
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/account-postings-jobs/' . self::JOB_ID . '?page=1', 200, $ndjson, [
            'Content-Type' => 'application/x-ndjson',
            'x-current-page' => '1',
            'x-page-size' => '100000',
            'x-total-count' => '1',
            'x-total-pages' => '1',
        ]);

        $postingsEndpoint = new AccountPostingsEndpoint($this->client, self::CLIENT_ID, self::FISCAL_YEAR_ID);
        $job = $postingsEndpoint->createJob(true);
        $this->assertSame(self::JOB_ID, $job?->getJobId());

        $jobsEndpoint = new JobsEndpoint($this->client, self::CLIENT_ID);
        $state = $jobsEndpoint->waitForJob(self::JOB_ID, new JobPoller(5, 1));
        $this->assertSame(DataExchangeJobState::Completed, $state?->getJobState());

        $resultEndpoint = new AccountPostingsJobsEndpoint($this->client, self::CLIENT_ID);
        $page = $resultEndpoint->getPage(self::JOB_ID, 1);

        $this->assertSame(1, $page->getItems()?->count());
        $this->assertSame(1, $page->getPageMeta()?->currentPage);
        $this->assertFalse($page->hasNext());

        $posting = $page->getItems()->getFirstValue();
        $this->assertNotNull($posting);
        $this->assertSame(10000, $posting->getAccountNumber());
        $this->assertSame(DataExchangeRecordType::FinancialAccounting, $posting->getRecordType());
        $this->assertSame('abc-123', $posting->getDocumentLink()?->getDocumentGuid());
    }

    public function test_master_data_lists_ndjson(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('GET', $this->fiscalYearBase() . '/accounting-sequences', 200, json_encode(['accountingSequenceId' => 1, 'recordType' => 'financial_accounting']), ['Content-Type' => 'application/x-ndjson']);
        $this->registerMockResponse('GET', $this->fiscalYearBase() . '/general-ledger-accounts', 200, json_encode(['accountNumber' => 4400, 'caption' => 'Erlöse']), ['Content-Type' => 'application/x-ndjson']);
        $this->registerMockResponse('GET', $this->fiscalYearBase() . '/terms-of-payment', 200, json_encode(['id' => 1, 'caption' => '14 Tage netto', 'paymentDueInDays' => ['dueDateNet' => 14]]), ['Content-Type' => 'application/x-ndjson']);
        $this->registerMockResponse('GET', $this->fiscalYearBase() . '/sums-and-balances', 200, json_encode(['accountNumber' => 4400, 'balance' => 100.5, 'sumsAndBalancesMonthValues' => [['monthlyBalance' => 100.5, 'fiscalYearMonth' => 1]]]), ['Content-Type' => 'application/x-ndjson']);

        $sequences = (new AccountingSequencesEndpoint($this->client, self::CLIENT_ID, self::FISCAL_YEAR_ID))->search();
        $this->assertSame(1, $sequences?->count());

        $accounts = (new GeneralLedgerAccountsEndpoint($this->client, self::CLIENT_ID, self::FISCAL_YEAR_ID))->search();
        $this->assertSame('Erlöse', $accounts?->getFirstValue()?->getCaption());

        $terms = (new TermsOfPaymentEndpoint($this->client, self::CLIENT_ID, self::FISCAL_YEAR_ID))->search();
        $this->assertSame(14, $terms?->getFirstValue()?->getPaymentDueInDays()?->getDueDateNet());

        $sums = (new SumsAndBalancesEndpoint($this->client, self::CLIENT_ID, self::FISCAL_YEAR_ID))->search();
        // getBalance() liefert Money (kanonischer Dezimalstring), nicht float.
        $this->assertSame('100.50', $sums?->getFirstValue()?->getBalance()?->getAmount());
        $this->assertSame(1, $sums->getFirstValue()->getSumsAndBalancesMonthValues()?->count());
    }

    public function test_agricultural_financial_statement_csv(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('GET', $this->fiscalYearBase() . '/agricultural-financial-statement', 200, "a;b;c\n1;2;3", [
            'Content-Type' => 'text/csv',
            'plausibility' => 'PLAUSIBLE',
            'timestamp' => '2026-07-03T10:00:00Z',
        ]);

        $endpoint = new AgriculturalFinancialStatementEndpoint($this->client, self::CLIENT_ID, self::FISCAL_YEAR_ID);
        $statement = $endpoint->getStatement();

        $this->assertNotNull($statement);
        $this->assertStringContainsString('a;b;c', $statement->csv);
        $this->assertSame('PLAUSIBLE', $statement->plausibility);
    }

    public function test_sums_and_balances_quantity_and_weight_job_flow(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('POST', $this->fiscalYearBase() . '/sums-and-balances-quantity-and-weight', 202, ['jobId' => self::JOB_ID]);
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/sums-and-balances-quantity-and-weight-jobs/' . self::JOB_ID, 200, json_encode(['accountNumber' => 4400, 'openingBalance' => 5.5]), ['Content-Type' => 'application/x-ndjson']);

        $job = (new SumsAndBalancesQuantityAndWeightEndpoint($this->client, self::CLIENT_ID, self::FISCAL_YEAR_ID))->createJob();
        $this->assertSame(self::JOB_ID, $job?->getJobId());

        $result = (new SumsAndBalancesQuantityAndWeightJobsEndpoint($this->client, self::CLIENT_ID))->getResult(self::JOB_ID);
        $this->assertSame(4400, $result?->getFirstValue()?->getAccountNumber());
    }
}
