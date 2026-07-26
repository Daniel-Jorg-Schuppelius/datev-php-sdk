<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Period.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDataExchange\TermsOfPayment;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Fälligkeitszeitraum einer Zahlungsbedingung.
 */
class Period extends NamedEntity {
    protected int $invoiceDayOfMonth;

    protected DueDate $dueDateCashDiscount1;

    protected DueDate $dueDateCashDiscount2;

    protected DueDate $dueDateNet;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getInvoiceDayOfMonth(): ?int {
        return $this->invoiceDayOfMonth ?? null;
    }

    public function getDueDateCashDiscount1(): ?DueDate {
        return $this->dueDateCashDiscount1 ?? null;
    }

    public function getDueDateCashDiscount2(): ?DueDate {
        return $this->dueDateCashDiscount2 ?? null;
    }

    public function getDueDateNet(): ?DueDate {
        return $this->dueDateNet ?? null;
    }
}
