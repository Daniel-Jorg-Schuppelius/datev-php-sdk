<?php

declare(strict_types=1);

namespace Datev\Enums;

enum WindingUpStatus: string {
    case IA = 'IA';      // im Auftrag
    case IL = 'IL';      // in Liquidation
    case INABW = 'INABW'; // in Abwicklung
    case INLIQ = 'INLIQ'; // in Liquidation
}
