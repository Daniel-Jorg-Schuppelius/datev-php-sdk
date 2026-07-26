<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PaymentDueInDays.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDataExchange\TermsOfPayment;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Fälligkeit in Tagen (Skonto 1/2, netto).
 */
class PaymentDueInDays extends NamedEntity {
    protected int $cashDiscount1Days;

    protected int $cashDiscount2Days;

    protected int $dueDateNet;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getCashDiscount1Days(): ?int {
        return $this->cashDiscount1Days ?? null;
    }

    public function getCashDiscount2Days(): ?int {
        return $this->cashDiscount2Days ?? null;
    }

    public function getDueDateNet(): ?int {
        return $this->dueDateNet ?? null;
    }
}
