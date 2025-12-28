<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Due.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\Dues;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Psr\Log\LoggerInterface;

class Due extends NamedEntity {
    protected ?DateTime $assessment_period;
    protected ?DateTime $date;
    protected ?float $amount;
    protected ?float $tax_percentage;
    protected ?float $tax_amount;
    protected ?string $supplementary_work;
    protected ?DateTime $notification_date;
    protected ?string $notification_number;
    protected ?string $tariff_caption;
    protected ?string $tariff_additional_caption;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getAssessmentPeriod(): ?DateTime {
        return $this->assessment_period ?? null;
    }

    public function getDate(): ?DateTime {
        return $this->date ?? null;
    }

    public function getAmount(): ?float {
        return $this->amount ?? null;
    }

    public function getTaxPercentage(): ?float {
        return $this->tax_percentage ?? null;
    }

    public function getTaxAmount(): ?float {
        return $this->tax_amount ?? null;
    }

    public function getNotificationNumber(): ?string {
        return $this->notification_number ?? null;
    }

    public function getTariffCaption(): ?string {
        return $this->tariff_caption ?? null;
    }
}
