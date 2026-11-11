<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DueAsPeriod.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\TermsOfPayment;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class DueAsPeriod extends NamedEntity {
    protected ?Period $period1;
    protected ?Period $period2;
    protected ?Period $period3;

    /**
     * @param array<string, mixed>|object|null $data
     */
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
