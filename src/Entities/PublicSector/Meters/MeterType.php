<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MeterType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\Meters;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class MeterType extends NamedEntity {
    protected ?int $id;
    protected ?string $name;
    protected ?string $type;
    protected ?string $mechanism;
    protected ?float $nominal_flow_rate;
    protected ?int $count_of_pre_decimal_digits;
    protected ?int $count_of_post_decimal_digits;
    protected ?string $periodicity_of_calibration;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?int {
        return $this->id ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getType(): ?string {
        return $this->type ?? null;
    }

    public function getMechanism(): ?string {
        return $this->mechanism ?? null;
    }
}
