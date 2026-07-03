<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HrFileJobState.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums\Online;

/**
 * Status einer über hr:files hochgeladenen Datei.
 */
enum HrFileJobState: string {
    case Uploaded = 'uploaded';
    case Imported = 'imported';
    case Corrupted = 'corrupted';
    case Deleted = 'deleted';
    case AutoDeleted = 'auto-deleted';
}
