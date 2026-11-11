<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AssignmentCriteria.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\PostingProposalRules;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class AssignmentCriteria extends NamedEntity {
    protected ?string $goods_and_services;
    protected ?string $name;
    protected ?float $tax_rate;
    protected ?float $amount;
    protected ?int $cash_account_number;
    protected ?string $currency_code;
    protected ?string $document_description;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getGoodsAndServices(): ?string {
        return $this->goods_and_services ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getTaxRate(): ?float {
        return $this->tax_rate ?? null;
    }

    public function getAmount(): ?float {
        return $this->amount ?? null;
    }

    public function getCashAccountNumber(): ?int {
        return $this->cash_account_number ?? null;
    }

    public function getCurrencyCode(): ?string {
        return $this->currency_code ?? null;
    }

    public function getDocumentDescription(): ?string {
        return $this->document_description ?? null;
    }
}
