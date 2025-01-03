<?php
/*
 * Created on   : Sat Nov 02 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : InspectionStatus.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums;

enum InspectionStatus: string {
    case NotSpecified = "not_specified"; // OK
    case RecordWithError = "record_with_error";
    case RecordWithWarning = "record_with_warning";
}
