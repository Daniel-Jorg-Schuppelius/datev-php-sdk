<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PostingProposalRule.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\PostingProposalRules;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class PostingProposalRule extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected PostingProposalRuleID $id;
    protected ?int $account_number;
    protected ?int $contra_account_number;
    protected ?string $posting_description;
    protected ?string $cost_center_1;
    protected ?string $cost_center_2;
    protected ?string $business_partner_name;
    protected ?string $business_partner_number;
    protected ?string $iban;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): PostingProposalRuleID {
        return $this->id;
    }

    public function getAccountNumber(): ?int {
        return $this->account_number ?? null;
    }

    public function getContraAccountNumber(): ?int {
        return $this->contra_account_number ?? null;
    }

    public function getPostingDescription(): ?string {
        return $this->posting_description ?? null;
    }

    public function getCostCenter1(): ?string {
        return $this->cost_center_1 ?? null;
    }

    public function getCostCenter2(): ?string {
        return $this->cost_center_2 ?? null;
    }
}
