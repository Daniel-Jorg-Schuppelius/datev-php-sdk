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
use Psr\Log\LoggerInterface;

class ExpenseType extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?ExpenseTypeID $id;
    protected ?string $short_name;
    protected ?string $name;
    protected ?int $number;
    protected ?string $visibility;
    protected ?bool $hourly_billing;
    protected ?bool $default_display;

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
}
