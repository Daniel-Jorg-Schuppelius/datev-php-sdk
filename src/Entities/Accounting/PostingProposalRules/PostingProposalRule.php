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
use DateTime;
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
    protected ?AssignmentCriteria $assignment_criteria;
    protected ?DateTime $creation_date;
    protected ?DateTime $last_used_date;
    protected ?PostingProposalInformationList $posting_proposal_information;
    protected ?bool $uncertain_label;

    /**
     * @param array<string, mixed>|object|null $data
     */
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

    public function getAssignmentCriteria(): ?AssignmentCriteria {
        return $this->assignment_criteria ?? null;
    }

    public function getCreationDate(): ?DateTime {
        return $this->creation_date ?? null;
    }

    public function getLastUsedDate(): ?DateTime {
        return $this->last_used_date ?? null;
    }

    public function getPostingProposalInformation(): ?PostingProposalInformationList {
        return $this->posting_proposal_information ?? null;
    }

    public function isUncertainLabel(): ?bool {
        return $this->uncertain_label ?? null;
    }
}
