<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingTransactionKey.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\AccountingTransactionKeys;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class AccountingTransactionKey extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected AccountingTransactionKeyID $id;
    protected ?string $additional_function;
    protected ?string $caption;
    protected ?int $cases_related_to_goods_and_services;
    protected ?DateTime $date_from;
    protected ?DateTime $date_to;
    protected ?int $factor2_account1;
    protected ?int $factor2_account2;
    protected ?float $factor2_percent;
    protected ?bool $is_tax_rate_selectable;
    protected ?int $number;
    protected ?float $tax_rate;
    protected ?string $group;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): AccountingTransactionKeyID {
        return $this->id;
    }

    public function getAdditionalFunction(): ?string {
        return $this->additional_function ?? null;
    }

    public function getCaption(): ?string {
        return $this->caption ?? null;
    }

    public function getCasesRelatedToGoodsAndServices(): ?int {
        return $this->cases_related_to_goods_and_services ?? null;
    }

    public function getDateFrom(): ?DateTime {
        return $this->date_from ?? null;
    }

    public function getDateTo(): ?DateTime {
        return $this->date_to ?? null;
    }

    public function getFactor2Account1(): ?int {
        return $this->factor2_account1 ?? null;
    }

    public function getFactor2Account2(): ?int {
        return $this->factor2_account2 ?? null;
    }

    public function getFactor2Percent(): ?float {
        return $this->factor2_percent ?? null;
    }

    public function isTaxRateSelectable(): ?bool {
        return $this->is_tax_rate_selectable ?? null;
    }

    public function getNumber(): ?int {
        return $this->number ?? null;
    }

    public function getTaxRate(): ?float {
        return $this->tax_rate ?? null;
    }

    public function getGroup(): ?string {
        return $this->group ?? null;
    }
}
