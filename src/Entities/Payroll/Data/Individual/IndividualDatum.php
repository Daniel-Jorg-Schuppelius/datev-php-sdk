<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : IndividualDatum.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\Data\Individual;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterface;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class IndividualDatum extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected IndividualDatumID $id;
    /**
     * @var array<array-key, mixed>
     */
    protected ?array $data;
    protected ?string $long_field_name;
    protected ?string $short_field_name;
    protected ?DateTime $date;
    protected ?float $amount;
    protected ?string $long_field_name2;
    protected ?string $short_field_name2;
    protected ?DateTime $date2;
    protected ?float $amount2;
    protected ?string $long_field_name3;
    protected ?string $short_field_name3;
    protected ?DateTime $date3;
    protected ?float $amount3;
    protected ?string $long_field_name4;
    protected ?string $short_field_name4;
    protected ?DateTime $date4;
    protected ?float $amount4;
    protected ?string $long_field_name5;
    protected ?string $short_field_name5;
    protected ?DateTime $date5;
    protected ?float $amount5;
    protected ?string $long_field_name6;
    protected ?string $short_field_name6;
    protected ?DateTime $date6;
    protected ?float $amount6;
    protected ?string $long_field_name7;
    protected ?string $short_field_name7;
    protected ?DateTime $date7;
    protected ?float $amount7;
    protected ?string $long_field_name8;
    protected ?string $short_field_name8;
    protected ?DateTime $date8;
    protected ?float $amount8;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): IndividualDatumID {
        return $this->id;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): NamedEntityInterface {
        if (is_array($data)) {
            if (isset($data['id'])) {
                $this->id = new IndividualDatumID($data['id']);
            }

            $this->data = [];

            $recordData = [
                "long_field_name" => $data['long_field_name'] ?? null,
                "short_field_name" => $data['short_field_name'] ?? null,
                "date" => $data['date'] ?? null,
                "amount" => isset($data['amount']) ? (float) $data['amount'] : null,
            ];

            $this->data[] = new IndividualDatumRecord($recordData, self::$logger);

            $index = 2;
            while (
                array_key_exists("long_field_name{$index}", $data) ||
                array_key_exists("short_field_name{$index}", $data) ||
                array_key_exists("date{$index}", $data) ||
                array_key_exists("amount{$index}", $data)
            ) {
                $recordData = [
                    "long_field_name" => $data["long_field_name{$index}"] ?? null,
                    "short_field_name" => $data["short_field_name{$index}"] ?? null,
                    "date" => $data["date{$index}"] ?? null,
                    "amount" => isset($data["amount{$index}"]) ? (float) $data["amount{$index}"] : null,
                ];

                $this->data[] = new IndividualDatumRecord($recordData, self::$logger);

                $index++;
            }
        }

        return $this;
    }

    /**
     * @return array<array-key, mixed>
     */
    public function toArray(): array {
        $result = [
            'id' => $this->getID()->toString(),
        ];

        if (isset($this->data[0])) {
            $firstRecord = $this->data[0];
            $result['long_field_name'] = $firstRecord->getLongFieldName();
            $result['short_field_name'] = $firstRecord->getShortFieldName();
            $result['date'] = $firstRecord->getDate() ? $firstRecord->getDate()->format('Y-m-d') : null;
            $result['amount'] = $firstRecord->getAmount()?->toFloat();
        }

        foreach ($this->data ?? [] as $index => $record) {
            if ($index === 0) {
                continue;
            }

            $indexPlusOne = $index + 1;

            $result["long_field_name{$indexPlusOne}"] = $record->getLongFieldName();
            $result["short_field_name{$indexPlusOne}"] = $record->getShortFieldName();
            $result["date{$indexPlusOne}"] = $record->getDate() ? $record->getDate()->format('Y-m-d') : null;
            $result["amount{$indexPlusOne}"] = $record->getAmount()?->toFloat();
        }

        return $result;
    }

    public function getLongFieldName(): ?string {
        return $this->long_field_name ?? null;
    }

    public function getShortFieldName(): ?string {
        return $this->short_field_name ?? null;
    }

    public function getDate(): ?DateTime {
        return $this->date ?? null;
    }

    public function getAmount(): ?float {
        return $this->amount ?? null;
    }

    public function getLongFieldName2(): ?string {
        return $this->long_field_name2 ?? null;
    }

    public function getShortFieldName2(): ?string {
        return $this->short_field_name2 ?? null;
    }

    public function getDate2(): ?DateTime {
        return $this->date2 ?? null;
    }

    public function getAmount2(): ?float {
        return $this->amount2 ?? null;
    }

    public function getLongFieldName3(): ?string {
        return $this->long_field_name3 ?? null;
    }

    public function getShortFieldName3(): ?string {
        return $this->short_field_name3 ?? null;
    }

    public function getDate3(): ?DateTime {
        return $this->date3 ?? null;
    }

    public function getAmount3(): ?float {
        return $this->amount3 ?? null;
    }

    public function getLongFieldName4(): ?string {
        return $this->long_field_name4 ?? null;
    }

    public function getShortFieldName4(): ?string {
        return $this->short_field_name4 ?? null;
    }

    public function getDate4(): ?DateTime {
        return $this->date4 ?? null;
    }

    public function getAmount4(): ?float {
        return $this->amount4 ?? null;
    }

    public function getLongFieldName5(): ?string {
        return $this->long_field_name5 ?? null;
    }

    public function getShortFieldName5(): ?string {
        return $this->short_field_name5 ?? null;
    }

    public function getDate5(): ?DateTime {
        return $this->date5 ?? null;
    }

    public function getAmount5(): ?float {
        return $this->amount5 ?? null;
    }

    public function getLongFieldName6(): ?string {
        return $this->long_field_name6 ?? null;
    }

    public function getShortFieldName6(): ?string {
        return $this->short_field_name6 ?? null;
    }

    public function getDate6(): ?DateTime {
        return $this->date6 ?? null;
    }

    public function getAmount6(): ?float {
        return $this->amount6 ?? null;
    }

    public function getLongFieldName7(): ?string {
        return $this->long_field_name7 ?? null;
    }

    public function getShortFieldName7(): ?string {
        return $this->short_field_name7 ?? null;
    }

    public function getDate7(): ?DateTime {
        return $this->date7 ?? null;
    }

    public function getAmount7(): ?float {
        return $this->amount7 ?? null;
    }

    public function getLongFieldName8(): ?string {
        return $this->long_field_name8 ?? null;
    }

    public function getShortFieldName8(): ?string {
        return $this->short_field_name8 ?? null;
    }

    public function getDate8(): ?DateTime {
        return $this->date8 ?? null;
    }

    public function getAmount8(): ?float {
        return $this->amount8 ?? null;
    }
}
