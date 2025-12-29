<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostSystem.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\CostSystems;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class CostSystem extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected CostSystemID $id;
    protected ?string $caption;
    protected ?string $cost_system_type;
    protected ?int $cost_length;
    protected ?bool $is_active;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): CostSystemID {
        return $this->id;
    }

    public function getCaption(): ?string {
        return $this->caption ?? null;
    }

    public function getCostSystemType(): ?string {
        return $this->cost_system_type ?? null;
    }

    public function getCostLength(): ?int {
        return $this->cost_length ?? null;
    }

    public function isActive(): ?bool {
        return $this->is_active ?? null;
    }
}
