<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DueInDays.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\TermsOfPayment;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class DueInDays extends NamedEntity {
    protected ?int $cash_discount1_days;
    protected ?int $cash_discount2_days;
    protected ?int $due_in_days;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getCashDiscount1Days(): ?int {
        return $this->cash_discount1_days ?? null;
    }

    public function getCashDiscount2Days(): ?int {
        return $this->cash_discount2_days ?? null;
    }

    public function getDueInDays(): ?int {
        return $this->due_in_days ?? null;
    }
}
