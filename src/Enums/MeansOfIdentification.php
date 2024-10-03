<?php

declare(strict_types=1);

namespace Datev\Enums;

enum MeansOfIdentification: string {
    case EZ = 'Erkennungszeuge';
    case FS = 'Führerschein';
    case PA = 'Personalausweis';
    case PB = 'Persönliche Bekanntschaft';
    case RP = 'Reisepass';
    case SA = 'Sonstiger Ausweis';
    case SK = 'Besondere Sachkunde';
    case UK = 'Urkunde';
    case IN = 'Elektronischer Identitätsnachweis';
    case ES = 'Qualifizierte elektronische Signatur';
    case IS = 'Elektronisches Identifizierungssystem';
}
