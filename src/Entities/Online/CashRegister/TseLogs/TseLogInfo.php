<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TseLogInfo.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\CashRegister\TseLogs;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Informationen zu hochgeladenen TSE-Logs einer technischen Sicherheitseinrichtung.
 */
class TseLogInfo extends NamedEntity {
    protected string $serial_number;

    protected int $max_signature_counter;

    protected string $custom_field;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getSerialNumber(): ?string {
        return $this->serial_number ?? null;
    }

    public function getMaxSignatureCounter(): ?int {
        return $this->max_signature_counter ?? null;
    }

    public function getCustomField(): ?string {
        return $this->custom_field ?? null;
    }
}
