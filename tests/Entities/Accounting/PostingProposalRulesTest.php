<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\PostingProposalRules\PostingProposalRules;
use Datev\Entities\Accounting\PostingProposalRules\PostingProposalRule;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class PostingProposalRulesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "rule-1", "account_number" => 1200, "contra_account_number" => 8400, "posting_description" => "Regel Miete"],
                ["id" => "rule-2", "account_number" => 1400, "contra_account_number" => 8300, "posting_description" => "Regel Büromaterial"]
            ]
        ];
        $collection = new PostingProposalRules($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(PostingProposalRule::class, $collection->getValues()[0]);
    }
}
