<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DueDate.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDataExchange\TermsOfPayment;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Enums\Online\DataExchangeRelatedMonth;
use Psr\Log\LoggerInterface;

/**
 * Fälligkeitsangabe einer Zahlungsbedingung (Monat + Tag).
 */
class DueDate extends NamedEntity {
    protected DataExchangeRelatedMonth $relatedMonth;

    protected int $dayOfMonth;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getRelatedMonth(): ?DataExchangeRelatedMonth {
        return $this->relatedMonth ?? null;
    }

    public function getDayOfMonth(): ?int {
        return $this->dayOfMonth ?? null;
    }
}
