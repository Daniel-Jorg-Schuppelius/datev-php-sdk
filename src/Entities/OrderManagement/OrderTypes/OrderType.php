<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OrderType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\OrderTypes;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class OrderType extends NamedEntity {
    protected ?OrderTypeID $id;
    protected ?string $ordertype;
    protected ?string $ordertype_name;
    protected ?int $ordertype_group;
    protected ?string $ordertype_group_name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?OrderTypeID {
        return $this->id ?? null;
    }

    public function getOrderType(): ?string {
        return $this->ordertype ?? null;
    }

    public function getOrderTypeName(): ?string {
        return $this->ordertype_name ?? null;
    }

    public function getOrderTypeGroup(): ?int {
        return $this->ordertype_group ?? null;
    }

    public function getOrderTypeGroupName(): ?string {
        return $this->ordertype_group_name ?? null;
    }
}
