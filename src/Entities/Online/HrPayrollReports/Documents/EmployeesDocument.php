<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeesDocument.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrPayrollReports\Documents;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Auswertungsdokumente eines Arbeitnehmers.
 */
class EmployeesDocument extends NamedEntity {
    protected int $employee_number;

    protected MetadataEntries $document;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getEmployeeNumber(): ?int {
        return $this->employee_number ?? null;
    }

    public function getDocument(): ?MetadataEntries {
        return $this->document ?? null;
    }
}
