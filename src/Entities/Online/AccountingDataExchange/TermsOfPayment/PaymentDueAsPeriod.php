<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PaymentDueAsPeriod.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDataExchange\TermsOfPayment;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Fälligkeit als Zeiträume (bis zu drei Perioden).
 */
class PaymentDueAsPeriod extends NamedEntity {
    protected Period $period1;

    protected Period $period2;

    protected Period $period3;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getPeriod1(): ?Period {
        return $this->period1 ?? null;
    }

    public function getPeriod2(): ?Period {
        return $this->period2 ?? null;
    }

    public function getPeriod3(): ?Period {
        return $this->period3 ?? null;
    }
}
