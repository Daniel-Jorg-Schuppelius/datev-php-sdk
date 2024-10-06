<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Order.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Orders;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class Order extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected OrderID $id;
    protected ?string $name;
    protected ?int $assessment_year;
    protected ?int $creation_year;
    protected int $number;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): OrderID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getAssessmentYear(): ?int {
        return $this->assessment_year ?? null;
    }

    public function getCreationYear(): ?int {
        return $this->creation_year ?? null;
    }

    public function getNumber(): int {
        return $this->number;
    }
}
