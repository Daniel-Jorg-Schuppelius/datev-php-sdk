<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\FinancialAccountings;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class FinancialAccounting extends NamedEntity implements IdentifiableInterface {
    protected FinancialAccountingID $id;
    protected ?string $different_consultant_number;
    protected ?string $different_client_number;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): FinancialAccountingID {
        return $this->id;
    }
}