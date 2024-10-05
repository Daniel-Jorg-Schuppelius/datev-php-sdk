<?php

declare(strict_types=1);

namespace Datev\Enums;

enum MeansOfIdentification: string {
    case Erkennungszeuge = 'EZ';
    case Führerschein = 'FS';
    case Personalausweis = 'PA';
    case PersönlicheBekanntschaft = 'PB';
    case Reisepass = 'RP';
    case SonstigerAusweis = 'SA';
    case BesondereSachkunde = 'SK';
    case Urkunde = 'UK';
    case ElektronischerIdentitätsnachweis = 'IN';
    case QualifizierteElektronischeSignatur = 'ES';
    case ElektronischesIdentifizierungssystem = 'IS';
}
