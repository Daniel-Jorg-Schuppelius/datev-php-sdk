<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MetadataEntry.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrPayrollReports\Documents;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Metadaten-Eintrag eines Auswertungsdokuments (Periode + Zeitstempel).
 */
class MetadataEntry extends NamedEntity {
    protected string $period;

    protected string $timestamp;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getPeriod(): ?string {
        return $this->period ?? null;
    }

    public function getTimestamp(): ?string {
        return $this->timestamp ?? null;
    }
}
