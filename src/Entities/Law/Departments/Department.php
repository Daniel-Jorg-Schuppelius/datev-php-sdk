<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Department.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\Departments;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Entities\GUID;
use Psr\Log\LoggerInterface;

class Department extends NamedEntity {
    protected ?GUID $id;
    protected ?int $number;
    protected ?string $short_name;
    protected ?string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getId(): ?GUID {
        return $this->id ?? null;
    }

    public function getNumber(): ?int {
        return $this->number ?? null;
    }

    public function getShortName(): ?string {
        return $this->short_name ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }
}
