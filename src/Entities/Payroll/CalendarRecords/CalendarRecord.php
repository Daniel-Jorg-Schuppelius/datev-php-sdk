<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CalendarRecord.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\CalendarRecords;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class CalendarRecord extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?CalendarRecordID $id;
    protected ?string $personnel_number;
    protected ?DateTime $date_of_emergence;
    protected ?DateTime $accounting_month;
    protected ?string $reason_for_absence_id;
    protected ?int $salary_type_id;
    protected ?float $hours;
    protected ?float $days;
    protected ?float $differing_factor;
    protected ?float $differing_pay_change;
    protected ?string $cost_center_id;
    protected ?string $cost_unit_id;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): CalendarRecordID {
        return $this->id;
    }
}
