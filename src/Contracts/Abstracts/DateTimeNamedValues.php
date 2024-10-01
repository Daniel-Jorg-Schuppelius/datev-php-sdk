<?php

declare(strict_types=1);

namespace Datev\Contracts\Abstracts;

use APIToolkit\Contracts\Abstracts\NamedValues;
use APIToolkit\Contracts\Interfaces\NamedEntityInterface;
use APIToolkit\Contracts\Interfaces\NamedValueInterface;
use DateTime;

abstract class DateTimeNamedValues extends NamedValues {
    public function toArray(bool $fullEntity = true, string $dateFormat = DateTime::RFC3339_EXTENDED): array {
        $result = [];
        if ($fullEntity) {
            foreach ($this->values as $key => $value) {
                if ($value instanceof DateTimeNamedValue) {
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
