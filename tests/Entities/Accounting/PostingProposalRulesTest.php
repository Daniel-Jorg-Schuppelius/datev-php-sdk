<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\PostingProposalRules\{PostingProposalRule, PostingProposalRules};
use Tests\Contracts\EntityTest;

class PostingProposalRulesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "rule-1", "account_number" => 1200, "contra_account_number" => 8400, "posting_description" => "Regel Miete"],
                ["id" => "rule-2", "account_number" => 1400, "contra_account_number" => 8300, "posting_description" => "Regel Büromaterial"],
            ],
        ];
        $collection = new PostingProposalRules($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(PostingProposalRule::class, $collection->getValues()[0]);
    }
}
