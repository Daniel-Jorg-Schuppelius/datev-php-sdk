<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HrImportFileType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums\Online;

/**
 * Typ einer hr:files-Importdatei: Bewegungsdaten (bwd) oder Stammdaten (psd).
 */
enum HrImportFileType: string {
    case MovementData = 'bwd';
    case MasterData = 'psd';
}
