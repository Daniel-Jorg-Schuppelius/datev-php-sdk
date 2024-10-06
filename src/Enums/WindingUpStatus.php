<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : WindingUpStatus.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums;

enum WindingUpStatus: string {
    case IA = 'IA';      // im Auftrag
    case IL = 'IL';      // in Liquidation
    case INABW = 'INABW'; // in Abwicklung
    case INLIQ = 'INLIQ'; // in Liquidation
}
