<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FinancialAccounting.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\FinancialAccountings;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class FinancialAccounting extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected FinancialAccountingID $id;
    protected ?string $different_consultant_number;
    protected ?string $different_client_number;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): FinancialAccountingID {
        return $this->id;
    }

    public function getDifferentConsultantNumber(): ?string {
        return $this->different_consultant_number ?? null;
    }

    public function getDifferentClientNumber(): ?string {
        return $this->different_client_number ?? null;
    }
}
