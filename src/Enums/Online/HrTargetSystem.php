<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HrTargetSystem.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums\Online;

/**
 * Ziel-Lohnabrechnungssystem für hr:files-Importe.
 */
enum HrTargetSystem: string {
    case Lug = 'lug';
    case Lodas = 'lodas';
}
