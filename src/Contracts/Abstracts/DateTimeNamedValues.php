<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DateTimeNamedValues.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Contracts\Abstracts;

use APIToolkit\Contracts\Abstracts\NamedValues;
use DateTime;

/**
 * @template T
 * @extends NamedValues<T>
 */
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
