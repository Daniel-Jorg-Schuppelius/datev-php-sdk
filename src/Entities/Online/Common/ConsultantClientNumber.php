<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ConsultantClientNumber.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\Common;

use InvalidArgumentException;
use Stringable;

/**
 * Verbundnummer "Beraternummer-Mandantennummer" (z. B. "29098-100").
 *
 * Mehrere Online-Dienste (hr:eau, hr-documents, accounting:extf-files)
 * adressieren Mandanten über diese zusammengesetzte Nummer statt über GUIDs.
 */
final class ConsultantClientNumber implements Stringable {
    private int $consultantNumber;

    private int $clientNumber;

    public function __construct(int $consultantNumber, int $clientNumber) {
        if ($consultantNumber < 1 || $consultantNumber > 9999999) {
            throw new InvalidArgumentException("Invalid consultant number: {$consultantNumber}");
        }
        if ($clientNumber < 1 || $clientNumber > 99999) {
            throw new InvalidArgumentException("Invalid client number: {$clientNumber}");
        }

        $this->consultantNumber = $consultantNumber;
        $this->clientNumber = $clientNumber;
    }

    /**
     * Erzeugt die Verbundnummer aus der String-Darstellung "Beraternummer-Mandantennummer".
     */
    public static function fromString(string $value): self {
        if (!preg_match('/^(\d{1,7})-(\d{1,5})$/', trim($value), $matches)) {
            throw new InvalidArgumentException("Invalid consultant-client number: \"{$value}\" (expected e.g. \"29098-100\")");
        }

        return new self((int) $matches[1], (int) $matches[2]);
    }

    public function getConsultantNumber(): int {
        return $this->consultantNumber;
    }

    public function getClientNumber(): int {
        return $this->clientNumber;
    }

    public function toString(): string {
        return "{$this->consultantNumber}-{$this->clientNumber}";
    }

    public function __toString(): string {
        return $this->toString();
    }

    public function equals(self $other): bool {
        return $this->consultantNumber === $other->consultantNumber && $this->clientNumber === $other->clientNumber;
    }
}
