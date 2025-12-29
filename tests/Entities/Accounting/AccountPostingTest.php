<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountPostingTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\Accounting\AccountPostings\AccountPosting;
use Datev\Entities\Accounting\AccountPostings\AccountPostings;
use PHPUnit\Framework\TestCase;

class AccountPostingTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateAccountPosting() {
        $data = [
            "id" => 1,
            "account_number" => 1800,
            "accounting_transaction_key" => 0,
            "amount_entered" => 1500.50,
            "billing_reference" => "RE-2024-001"
        ];

        $posting = new AccountPosting($data, $this->logger);
        $this->assertInstanceOf(AccountPosting::class, new AccountPosting());
        $this->assertInstanceOf(AccountPosting::class, $posting);
        $this->assertNotNull($posting->getID());
    }

    public function testCreateAccountPostings() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "account_number" => 1800,
                    "amount_entered" => 1000.00
                ],
                [
                    "id" => 2,
                    "account_number" => 4400,
                    "amount_entered" => 2000.00
                ]
            ]
        ];

        $postings = new AccountPostings($data, $this->logger);
        $this->assertInstanceOf(AccountPostings::class, $postings);
        $this->assertCount(2, $postings->getValues());
    }
}
