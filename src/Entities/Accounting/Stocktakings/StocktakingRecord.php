<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : StocktakingRecord.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\Stocktakings;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class StocktakingRecord extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected StocktakingRecordID $id;
    protected ?int $asset_number;
    protected ?string $inventory_number;
    protected ?int $accounting_reason;
    protected ?string $inventory_name;
    protected ?DateTime $acquisition_date;
    protected ?int $economic_lifetime;
    protected ?string $kost1_cost_center_id;
    protected ?int $branch;
    protected ?DateTime $order_date;
    protected ?string $origin_type;
    protected ?float $price;
    protected ?float $quantity;
    protected ?DateTime $stocktaking_date;
    protected ?string $unit;
    protected ?string $farmland_number;
    protected ?string $serial_number;
    protected ?string $location;
    protected ?string $contract_number;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): StocktakingRecordID {
        return $this->id;
    }

    public function getAssetNumber(): ?int {
        return $this->asset_number ?? null;
    }

    public function getInventoryNumber(): ?string {
        return $this->inventory_number ?? null;
    }

    public function getAccountingReason(): ?int {
        return $this->accounting_reason ?? null;
    }

    public function getInventoryName(): ?string {
        return $this->inventory_name ?? null;
    }

    public function getAcquisitionDate(): ?DateTime {
        return $this->acquisition_date ?? null;
    }

    public function getEconomicLifetime(): ?int {
        return $this->economic_lifetime ?? null;
    }

    public function getKost1CostCenterId(): ?string {
        return $this->kost1_cost_center_id ?? null;
    }

    public function getBranch(): ?int {
        return $this->branch ?? null;
    }

    public function getOrderDate(): ?DateTime {
        return $this->order_date ?? null;
    }

    public function getOriginType(): ?string {
        return $this->origin_type ?? null;
    }

    public function getPrice(): ?float {
        return $this->price ?? null;
    }

    public function getQuantity(): ?float {
        return $this->quantity ?? null;
    }

    public function getStocktakingDate(): ?DateTime {
        return $this->stocktaking_date ?? null;
    }

    public function getUnit(): ?string {
        return $this->unit ?? null;
    }

    public function getFarmlandNumber(): ?string {
        return $this->farmland_number ?? null;
    }

    public function getSerialNumber(): ?string {
        return $this->serial_number ?? null;
    }

    public function getLocation(): ?string {
        return $this->location ?? null;
    }

    public function getContractNumber(): ?string {
        return $this->contract_number ?? null;
    }
}
