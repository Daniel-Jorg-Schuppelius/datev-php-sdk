<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PaymentMethod.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums;

enum PaymentMethod: string {
    case NotSpecified = "not_specified";
    case DirectDebit = "direct_debit";
    case PaymentReminder = "payment_reminder";
    case Payment = "payment";
}
