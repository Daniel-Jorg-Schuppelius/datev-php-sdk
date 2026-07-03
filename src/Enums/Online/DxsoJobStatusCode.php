<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DxsoJobStatusCode.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums\Online;

/**
 * Verarbeitungsstatus eines DXSO-Jobs (accounting:dxso-jobs).
 */
enum DxsoJobStatusCode: int {
    /** Job ist offen und noch nicht finalisiert */
    case Open = 0;
    /** Verarbeitung wurde gestartet und läuft noch */
    case InProgress = 1;
    /** Verarbeitung erfolgreich abgeschlossen */
    case Succeeded = 2;
    /** Nicht verarbeitet — kritische Fehler */
    case Failed = 3;
    /** Teilweise verarbeitet — Fehler zu prüfen */
    case PartiallyProcessed = 4;
    /** In Belege online erfolgreich storniert */
    case Cancelled = 5;
    /** Stornierung abgelehnt — Voraussetzungen nicht erfüllt */
    case CancellationRejected = 6;

    /**
     * Endzustand erreicht (Verarbeitung weder offen noch laufend)?
     */
    public function isTerminal(): bool {
        return $this !== self::Open && $this !== self::InProgress;
    }
}
