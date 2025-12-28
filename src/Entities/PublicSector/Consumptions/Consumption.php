<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Consumption.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\Consumptions;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Entities\PublicSector\Meters\Meter;
use Datev\Entities\PublicSector\MeterReadings\MeterReading;
use DateTime;
use Psr\Log\LoggerInterface;

class Consumption extends NamedEntity {
    protected ?string $id;
    protected ?int $assessment_year;
    protected ?string $assessment_period;
    protected ?string $sub_assessment_period;
    protected ?string $description;
    protected ?string $effect_on_billing;
    protected ?bool $is_meter;
    protected ?bool $extrapolation;
    protected ?bool $prepayment;
    protected ?bool $show_way_of_calculation_on_notification;
    protected ?int $count_of_post_decimal_digits;
    protected ?DateTime $first_date;
    protected ?DateTime $last_date;
    protected ?string $changed_reason;
    protected ?float $quantity;
    protected ?float $quantity_to_be_billed;
    protected ?string $way_of_calculation;
    protected ?string $prior_consumption_id;
    protected ?string $following_consumption_id;
    protected ?Meter $meter;
    protected ?MeterReading $start_meterreading;
    protected ?MeterReading $end_meterreading;
    protected ?MeterReading $extrapolation_meterreading;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?string {
        return $this->id ?? null;
    }

    public function getAssessmentYear(): ?int {
        return $this->assessment_year ?? null;
    }

    public function getAssessmentPeriod(): ?string {
        return $this->assessment_period ?? null;
    }

    public function getSubAssessmentPeriod(): ?string {
        return $this->sub_assessment_period ?? null;
    }

    public function getDescription(): ?string {
        return $this->description ?? null;
    }

    public function getEffectOnBilling(): ?string {
        return $this->effect_on_billing ?? null;
    }

    public function isMeter(): ?bool {
        return $this->is_meter ?? null;
    }

    public function getExtrapolation(): ?bool {
        return $this->extrapolation ?? null;
    }

    public function getPrepayment(): ?bool {
        return $this->prepayment ?? null;
    }

    public function getShowWayOfCalculationOnNotification(): ?bool {
        return $this->show_way_of_calculation_on_notification ?? null;
    }

    public function getCountOfPostDecimalDigits(): ?int {
        return $this->count_of_post_decimal_digits ?? null;
    }

    public function getFirstDate(): ?DateTime {
        return $this->first_date ?? null;
    }

    public function getLastDate(): ?DateTime {
        return $this->last_date ?? null;
    }

    public function getChangedReason(): ?string {
        return $this->changed_reason ?? null;
    }

    public function getQuantity(): ?float {
        return $this->quantity ?? null;
    }

    public function getQuantityToBeBilled(): ?float {
        return $this->quantity_to_be_billed ?? null;
    }

    public function getWayOfCalculation(): ?string {
        return $this->way_of_calculation ?? null;
    }

    public function getPriorConsumptionId(): ?string {
        return $this->prior_consumption_id ?? null;
    }

    public function getFollowingConsumptionId(): ?string {
        return $this->following_consumption_id ?? null;
    }

    public function getMeter(): ?Meter {
        return $this->meter ?? null;
    }

    public function getStartMeterreading(): ?MeterReading {
        return $this->start_meterreading ?? null;
    }

    public function getEndMeterreading(): ?MeterReading {
        return $this->end_meterreading ?? null;
    }

    public function getExtrapolationMeterreading(): ?MeterReading {
        return $this->extrapolation_meterreading ?? null;
    }
}
