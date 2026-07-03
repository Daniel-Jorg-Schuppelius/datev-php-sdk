<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DataExchangeRelatedMonth.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums\Online;

/**
 * Bezugsmonat einer Fälligkeitsangabe (Zahlungsbedingungen im Accounting Data Exchange).
 */
enum DataExchangeRelatedMonth: string {
    case CurrentMonth = 'current_month';
    case NextMonth = 'next_month';
    case MonthAfterNext = 'month_after_next';
}
