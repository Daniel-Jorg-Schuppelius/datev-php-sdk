<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VocationalTraining.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\VocationalTrainings;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class VocationalTraining extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected VocationalTrainingID $id;
    protected string $personnel_number;
    protected ?float $amount;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): VocationalTrainingID {
        return $this->id;
    }

    public function getPersonnelNumber(): string {
        return $this->personnel_number;
    }

    public function getAmount(): ?float {
        return $this->amount ?? null;
    }
}
