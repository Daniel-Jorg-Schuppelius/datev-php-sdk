<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : IndividualData.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Individuelle Felder des Arbeitnehmers (bis zu acht Feldgruppen).
 */
class IndividualData extends NamedEntity {
    protected string $id;

    protected string $long_field_name;

    protected string $short_field_name;

    protected string $date;

    protected float $amount;

    protected string $long_field_name2;

    protected string $short_field_name2;

    protected string $date2;

    protected float $amount2;

    protected string $long_field_name3;

    protected string $short_field_name3;

    protected string $date3;

    protected float $amount3;

    protected string $long_field_name4;

    protected string $short_field_name4;

    protected string $date4;

    protected float $amount4;

    protected string $long_field_name5;

    protected string $short_field_name5;

    protected string $date5;

    protected float $amount5;

    protected string $long_field_name6;

    protected string $short_field_name6;

    protected string $date6;

    protected float $amount6;

    protected string $long_field_name7;

    protected string $short_field_name7;

    protected string $date7;

    protected float $amount7;

    protected string $long_field_name8;

    protected string $short_field_name8;

    protected string $date8;

    protected float $amount8;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getId(): ?string {
        return $this->id ?? null;
    }

    public function getLongFieldName(): ?string {
        return $this->long_field_name ?? null;
    }

    public function getShortFieldName(): ?string {
        return $this->short_field_name ?? null;
    }

    public function getDate(): ?string {
        return $this->date ?? null;
    }

    public function getAmount(): ?float {
        return $this->amount ?? null;
    }

    public function getLongFieldName2(): ?string {
        return $this->long_field_name2 ?? null;
    }

    public function getShortFieldName2(): ?string {
        return $this->short_field_name2 ?? null;
    }

    public function getDate2(): ?string {
        return $this->date2 ?? null;
    }

    public function getAmount2(): ?float {
        return $this->amount2 ?? null;
    }

    public function getLongFieldName3(): ?string {
        return $this->long_field_name3 ?? null;
    }

    public function getShortFieldName3(): ?string {
        return $this->short_field_name3 ?? null;
    }

    public function getDate3(): ?string {
        return $this->date3 ?? null;
    }

    public function getAmount3(): ?float {
        return $this->amount3 ?? null;
    }

    public function getLongFieldName4(): ?string {
        return $this->long_field_name4 ?? null;
    }

    public function getShortFieldName4(): ?string {
        return $this->short_field_name4 ?? null;
    }

    public function getDate4(): ?string {
        return $this->date4 ?? null;
    }

    public function getAmount4(): ?float {
        return $this->amount4 ?? null;
    }

    public function getLongFieldName5(): ?string {
        return $this->long_field_name5 ?? null;
    }

    public function getShortFieldName5(): ?string {
        return $this->short_field_name5 ?? null;
    }

    public function getDate5(): ?string {
        return $this->date5 ?? null;
    }

    public function getAmount5(): ?float {
        return $this->amount5 ?? null;
    }

    public function getLongFieldName6(): ?string {
        return $this->long_field_name6 ?? null;
    }

    public function getShortFieldName6(): ?string {
        return $this->short_field_name6 ?? null;
    }

    public function getDate6(): ?string {
        return $this->date6 ?? null;
    }

    public function getAmount6(): ?float {
        return $this->amount6 ?? null;
    }

    public function getLongFieldName7(): ?string {
        return $this->long_field_name7 ?? null;
    }

    public function getShortFieldName7(): ?string {
        return $this->short_field_name7 ?? null;
    }

    public function getDate7(): ?string {
        return $this->date7 ?? null;
    }

    public function getAmount7(): ?float {
        return $this->amount7 ?? null;
    }

    public function getLongFieldName8(): ?string {
        return $this->long_field_name8 ?? null;
    }

    public function getShortFieldName8(): ?string {
        return $this->short_field_name8 ?? null;
    }

    public function getDate8(): ?string {
        return $this->date8 ?? null;
    }

    public function getAmount8(): ?float {
        return $this->amount8 ?? null;
    }
}
