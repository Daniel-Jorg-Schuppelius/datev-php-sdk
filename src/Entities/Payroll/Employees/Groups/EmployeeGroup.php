<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeGroup.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\Employees\Groups;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class EmployeeGroup extends NamedEntity {
    protected ?string $number;
    protected ?string $name;
    protected ?int $clearing_account_id;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getNumber(): ?string {
        return $this->number ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getClearingAccountID(): ?int {
        return $this->clearing_account_id ?? null;
    }
}
