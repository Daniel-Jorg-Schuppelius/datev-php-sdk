<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PostingProposalRuleTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\Accounting\PostingProposalRules\PostingProposalRule;
use Datev\Entities\Accounting\PostingProposalRules\PostingProposalRules;
use PHPUnit\Framework\TestCase;

class PostingProposalRuleTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreatePostingProposalRule() {
        $data = [
            "id" => 1,
            "account_number" => 4400,
            "contra_account_number" => 1800,
            "posting_description" => "Umsatzerlöse",
            "cost_center_1" => "10000",
            "cost_center_2" => null,
            "business_partner_name" => "Kunde GmbH",
            "business_partner_number" => "K-001",
            "iban" => "DE89370400440532013000"
        ];

        $rule = new PostingProposalRule($data, $this->logger);
        $this->assertInstanceOf(PostingProposalRule::class, new PostingProposalRule());
        $this->assertInstanceOf(PostingProposalRule::class, $rule);
        $this->assertEquals(4400, $rule->getAccountNumber());
        $this->assertEquals(1800, $rule->getContraAccountNumber());
        $this->assertEquals("Umsatzerlöse", $rule->getPostingDescription());
        $this->assertEquals("10000", $rule->getCostCenter1());
    }

    public function testCreatePostingProposalRules() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "account_number" => 4400,
                    "posting_description" => "Regel 1"
                ],
                [
                    "id" => 2,
                    "account_number" => 4300,
                    "posting_description" => "Regel 2"
                ]
            ]
        ];

        $rules = new PostingProposalRules($data, $this->logger);
        $this->assertInstanceOf(PostingProposalRules::class, $rules);
        $this->assertCount(2, $rules->getValues());
    }
}
