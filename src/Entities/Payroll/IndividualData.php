<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterface;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class IndividualData extends NamedEntity implements IdentifiableInterface {
    protected IndividualDataID $id;
    protected ?array $dataRecords;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): IndividualDataID {
        return $this->id;
    }

    public function setData($data): NamedEntityInterface {
        if (is_array($data)) {
            if (isset($data['id'])) {
                $this->id = new IndividualDataID($data['id']);  // Setze die ID
            }

            // Dynamisch die nummerierten Felder verarbeiten
            $this->dataRecords = [];
            $index = 1;

            // Überprüfe, ob die nummerierten Felder existieren, und iteriere dynamisch
            while (
                isset($data["long_field_name{$index}"]) &&
                isset($data["short_field_name{$index}"]) &&
                isset($data["date{$index}"]) &&
                isset($data["amount{$index}"])
            ) {
                $recordData = [
                    "long_field_name" => $data["long_field_name{$index}"],
                    "short_field_name" => $data["short_field_name{$index}"],
                    "date" => $data["date{$index}"],
                    "amount" => $data["amount{$index}"],
                ];

                $this->dataRecords[] = new IndividualDataRecord($recordData, $this->logger);

                $index++;
            }
        }

        return $this;
    }

    public function toArray(): array {
        $result = [
            'id' => $this->getID()->toString()
        ];

        foreach ($this->dataRecords as $index => $record) {
            $indexPlusOne = $index + 1; // Damit die Nummerierung ab 1 startet, nicht ab 0

            $result["long_field_name{$indexPlusOne}"] = $record->getLongFieldName();
            $result["short_field_name{$indexPlusOne}"] = $record->getShortFieldName();
            $result["date{$indexPlusOne}"] = $record->getDate() ? $record->getDate()->format('Y-m-d') : null;
            $result["amount{$indexPlusOne}"] = $record->getAmount();
        }

        return $result;
    }
}