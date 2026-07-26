<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HourlyWage.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\HourlyWages;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use CommonToolkit\ValueObjects\Money;
use Datev\Traits\MoneyAccessorTrait;
use Psr\Log\LoggerInterface;

class HourlyWage extends NamedEntity implements IdentifiableNamedEntityInterface {
    use MoneyAccessorTrait;

    protected HourlyWageID $id;
    protected string $personnel_number;
    protected ?float $amount;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): HourlyWageID {
        return $this->id;
    }

    public function getPersonnelNumber(): string {
        return $this->personnel_number;
    }

    public function getAmount(): ?Money {
        return $this->toMoney($this->amount ?? null);
    }
}
