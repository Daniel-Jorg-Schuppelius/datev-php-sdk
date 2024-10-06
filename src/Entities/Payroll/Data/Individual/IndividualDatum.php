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
use Psr\Log\LoggerInterface;

class IndividualDatum extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected IndividualDatumID $id;
    protected ?array $data;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): IndividualDatumID {
        return $this->id;
    }

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

            $this->data[] = new IndividualDatumRecord($recordData, $this->logger);

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

                $this->data[] = new IndividualDatumRecord($recordData, $this->logger);

                $index++;
            }
        }

        return $this;
    }


    public function toArray(): array {
        $result = [
            'id' => $this->getID()->toString()
        ];

        if (isset($this->data[0])) {
            $firstRecord = $this->data[0];
            $result['long_field_name'] = $firstRecord->getLongFieldName();
            $result['short_field_name'] = $firstRecord->getShortFieldName();
            $result['date'] = $firstRecord->getDate() ? $firstRecord->getDate()->format('Y-m-d') : null;
            $result['amount'] = $firstRecord->getAmount();
        }

        foreach ($this->data as $index => $record) {
            if ($index === 0) {
                continue;
            }

            $indexPlusOne = $index + 1;

            $result["long_field_name{$indexPlusOne}"] = $record->getLongFieldName();
            $result["short_field_name{$indexPlusOne}"] = $record->getShortFieldName();
            $result["date{$indexPlusOne}"] = $record->getDate() ? $record->getDate()->format('Y-m-d') : null;
            $result["amount{$indexPlusOne}"] = $record->getAmount();
        }

        return $result;
    }
}
