<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : InternalCostService.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\InternalCostServices;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Psr\Log\LoggerInterface;

class InternalCostService extends NamedEntity {
    protected ?float $amount;
    protected ?string $cost_center_from;
    protected ?string $cost_center_to;
    protected ?string $document_field1;
    protected ?string $document_field2;
    protected ?int $IBLZ_number;
    protected ?DateTime $date;
    protected ?float $kost_quantity;
    protected ?DateTime $month;
    protected ?string $text;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getAmount(): ?float {
        return $this->amount ?? null;
    }

    public function getCostCenterFrom(): ?string {
        return $this->cost_center_from ?? null;
    }

    public function getCostCenterTo(): ?string {
        return $this->cost_center_to ?? null;
    }

    public function getDocumentField1(): ?string {
        return $this->document_field1 ?? null;
    }

    public function getDocumentField2(): ?string {
        return $this->document_field2 ?? null;
    }

    public function getIBLZNumber(): ?int {
        return $this->IBLZ_number ?? null;
    }

    public function getDate(): ?DateTime {
        return $this->date ?? null;
    }

    public function getKostQuantity(): ?float {
        return $this->kost_quantity ?? null;
    }

    public function getMonth(): ?DateTime {
        return $this->month ?? null;
    }

    public function getText(): ?string {
        return $this->text ?? null;
    }
}
