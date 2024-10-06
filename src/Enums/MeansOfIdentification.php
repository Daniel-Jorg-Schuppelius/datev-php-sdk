<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MeansOfIdentification.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

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
