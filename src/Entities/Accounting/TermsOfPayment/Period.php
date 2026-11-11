<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Period.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\TermsOfPayment;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class Period extends NamedEntity {
    protected ?int $invoice_day_of_month;
    protected ?DueDate $due_date_net;
    protected ?DueDate $due_date_cash_discount1;
    protected ?DueDate $due_date_cash_discount2;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getInvoiceDayOfMonth(): ?int {
        return $this->invoice_day_of_month ?? null;
    }

    public function getDueDateNet(): ?DueDate {
        return $this->due_date_net ?? null;
    }

    public function getDueDateCashDiscount1(): ?DueDate {
        return $this->due_date_cash_discount1 ?? null;
    }

    public function getDueDateCashDiscount2(): ?DueDate {
        return $this->due_date_cash_discount2 ?? null;
    }
}
