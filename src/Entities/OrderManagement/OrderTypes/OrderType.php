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
    protected ?string $ordertype_group;
    protected ?string $ordertype_group_name;
    protected ?int $ordertype_id;
    protected ?bool $active;
    protected ?bool $isinternal;
    protected ?int $ordertype_group_id;

    /**
     * @param array<string, mixed>|object|null $data
     */
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

    public function getOrderTypeGroup(): ?string {
        return $this->ordertype_group ?? null;
    }

    public function getOrderTypeGroupName(): ?string {
        return $this->ordertype_group_name ?? null;
    }

    public function getOrdertypeId(): ?int {
        return $this->ordertype_id ?? null;
    }

    public function isActive(): ?bool {
        return $this->active ?? null;
    }

    public function isIsinternal(): ?bool {
        return $this->isinternal ?? null;
    }

    public function getOrdertypeGroupId(): ?int {
        return $this->ordertype_group_id ?? null;
    }
}
