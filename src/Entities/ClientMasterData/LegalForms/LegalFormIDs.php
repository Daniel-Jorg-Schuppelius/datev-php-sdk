<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\LegalForms;

use APIToolkit\Contracts\Abstracts\NamedValues;
use DateTime;
use Datev\Contracts\Abstracts\DateTimeNamedValue;
use Psr\Log\LoggerInterface;

class LegalFormIDs extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = LegalFormID::class;

        parent::__construct($data, $logger);
    }

    public function toArray(bool $fullEntity = true, string $dateFormat = DateTime::RFC3339_EXTENDED): array {
        $result = [];
        if ($fullEntity) {
            foreach ($this->values as $key => $value) {
                if ($value instanceof LegalFormID || $value instanceof DateTimeNamedValue) {
                    $result[] = $value->toArray($fullEntity, $dateFormat);
                } else {
                    $result[] = $this->makeArray($key, $value, false, true, $dateFormat);
                }
            }
        } else {
            $result = parent::toArray();
        }
        return $result;
    }
}
