<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Company.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Enums\Status;
use Psr\Log\LoggerInterface;

class Company extends NamedEntity {
    protected ?string $id;
    protected ?int $number;
    protected ?string $name;
    protected ?Status $status;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getId(): ?string {
        return $this->id ?? null;
    }

    public function getNumber(): ?int {
        return $this->number ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getStatus(): ?Status {
        return $this->status ?? null;
    }
}
