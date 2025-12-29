<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostAccountingRecord.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\CostAccountingRecords;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class CostAccountingRecord extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?CostAccountingRecordID $id;
    protected ?float $amount;
    protected ?string $cost_center;
    protected ?string $contra_cost_center;
    protected ?DateTime $date;
    protected ?string $posting_description;
    protected ?int $record_number;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?CostAccountingRecordID {
        return $this->id ?? null;
    }

    public function getAmount(): ?float {
        return $this->amount ?? null;
    }

    public function getCostCenter(): ?string {
        return $this->cost_center ?? null;
    }

    public function getContraCostCenter(): ?string {
        return $this->contra_cost_center ?? null;
    }

    public function getDate(): ?DateTime {
        return $this->date ?? null;
    }

    public function getPostingDescription(): ?string {
        return $this->posting_description ?? null;
    }

    public function getRecordNumber(): ?int {
        return $this->record_number ?? null;
    }
}
