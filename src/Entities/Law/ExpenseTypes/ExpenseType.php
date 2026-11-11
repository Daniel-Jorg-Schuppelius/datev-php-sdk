<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExpenseType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\ExpenseTypes;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\Law\BillingCategories\BillingCategory;
use Datev\Entities\Law\ExpenseCategories\ExpenseCategory;
use Psr\Log\LoggerInterface;

class ExpenseType extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?ExpenseTypeID $id;
    protected ?string $short_name;
    protected ?string $name;
    protected ?int $number;
    protected ?string $visibility;
    protected ?bool $hourly_billing;
    protected ?bool $default_display;
    protected ?string $unit_name;
    protected ?float $unit_rate;
    protected ?ExpenseCategory $category;
    protected ?BillingCategory $billing_category;
    protected ?string $note;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?ExpenseTypeID {
        return $this->id ?? null;
    }

    public function getShortName(): ?string {
        return $this->short_name ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getNumber(): ?int {
        return $this->number ?? null;
    }

    public function getVisibility(): ?string {
        return $this->visibility ?? null;
    }

    public function isHourlyBilling(): ?bool {
        return $this->hourly_billing ?? null;
    }

    public function isDefaultDisplay(): ?bool {
        return $this->default_display ?? null;
    }

    public function getUnitName(): ?string {
        return $this->unit_name ?? null;
    }

    public function getUnitRate(): ?float {
        return $this->unit_rate ?? null;
    }

    public function getCategory(): ?ExpenseCategory {
        return $this->category ?? null;
    }

    public function getBillingCategory(): ?BillingCategory {
        return $this->billing_category ?? null;
    }

    public function getNote(): ?string {
        return $this->note ?? null;
    }
}
