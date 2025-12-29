<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Budget.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\Budgets;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class Budget extends NamedEntity {
    protected ?int $id;
    protected ?float $budget;
    protected ?float $sum_time_expenses;
    protected ?float $sum_taxable_expenses;
    protected ?float $unused_budget;
    protected ?string $currency_unit;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getId(): ?int {
        return $this->id ?? null;
    }

    public function getBudget(): ?float {
        return $this->budget ?? null;
    }

    public function getSumTimeExpenses(): ?float {
        return $this->sum_time_expenses ?? null;
    }

    public function getSumTaxableExpenses(): ?float {
        return $this->sum_taxable_expenses ?? null;
    }

    public function getUnusedBudget(): ?float {
        return $this->unused_budget ?? null;
    }

    public function getCurrencyUnit(): ?string {
        return $this->currency_unit ?? null;
    }
}
