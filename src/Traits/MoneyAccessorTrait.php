<?php
/*
 * Created on   : Sun Jul 26 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MoneyAccessorTrait.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Traits;

use CommonToolkit\Enums\CurrencyCode;
use CommonToolkit\ValueObjects\Money;

/**
 * Geldbeträge der DATEV-Entities.
 *
 * Die Desktop-API liefert Beträge als JSON-Zahlen; die Hydrierung legt sie
 * deshalb weiterhin als float ab (mehr Genauigkeit hat die Quelle nicht).
 * **Gelesen** wird ausschließlich {@see Money}: die Umwandlung passiert an
 * dieser einen Stelle, inklusive Währung — ab dort rechnet der Aufrufer exakt.
 */
trait MoneyAccessorTrait {
    /**
     * Rohbetrag der API → Money in der Belegwährung (null bleibt null).
     */
    protected function toMoney(?float $amount, ?CurrencyCode $currency = null): ?Money {
        if ($amount === null) {
            return null;
        }

        return Money::ofFloat($amount, $currency ?? $this->entityCurrency());
    }

    /**
     * Belegwährung der Entity; ohne eigenes Feld gilt der Euro
     * (DATEV-Rechnungswesen führt Mandantenbuchhaltung in Euro).
     */
    protected function entityCurrency(): CurrencyCode {
        foreach (['currency', 'currency_code', 'waehrung'] as $field) {
            if (property_exists($this, $field) && isset($this->{$field})) {
                $value = $this->{$field};
                if ($value instanceof CurrencyCode) {
                    return $value;
                }
                if (is_string($value) && $value !== '') {
                    return CurrencyCode::tryFrom(strtoupper($value)) ?? CurrencyCode::Euro;
                }
            }
        }

        return CurrencyCode::Euro;
    }
}
