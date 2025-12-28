<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostSequence.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\CostSequences;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class CostSequence extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected CostSequenceID $id;
    protected ?string $description;
    protected ?DateTime $date_from;
    protected ?DateTime $date_to;
    protected ?string $initials;
    protected ?bool $is_committed;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): CostSequenceID {
        return $this->id;
    }

    public function getDescription(): ?string {
        return $this->description ?? null;
    }

    public function getDateFrom(): ?DateTime {
        return $this->date_from ?? null;
    }

    public function getDateTo(): ?DateTime {
        return $this->date_to ?? null;
    }

    public function getInitials(): ?string {
        return $this->initials ?? null;
    }

    public function isCommitted(): ?bool {
        return $this->is_committed ?? null;
    }
}
